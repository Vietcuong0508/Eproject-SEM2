<?php

namespace App\Http\Controllers;

use App\Models\AddToCart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddToCartController extends Controller
{

    public function index()
    {
        $list = AddToCart::all();
        return view('/client/shopping-cart', ['list' => $list]);
    }

    public function add($id)
    {
        $product = Product::find($id);
        Cart::add($product->id, $product->name, 1, floatval($product->price), 10, ['thumbnail' => $product->thumbnail]);
//        return $cart;
        return redirect('/show')->with('add', 'Thêm mới sản phẩm vào giỏ hàng thành công');
    }

    public function show()
    {
        return view('/client/shopping-cart');
    }

    public function update(Request $request)
    {
        $id = $request->get('rowId');
        $quantity = $request->get('quantity');
        Cart::update($id, $quantity);
        return redirect('/show')->with('update', 'Update sản phẩm thành công');
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect('/show')->with('remove', 'Xóa sản phẩm khỏi giỏ hàng thành công');
    }

    public function destroy()
    {
        Cart::destroy();
        return redirect('/show')->with('destroy', 'Xóa tất cả sản phẩm khỏi giỏ hàng thành công');
    }

    public function create_payment(Request $request)
    {
        $shopping_cart = Session::get('shoppingCart');

        $order = new Order();
        $order->fill($request->all());
        $amount = 0;
        foreach ($shopping_cart as $item) {
            $amount += $item->price * $item->quantity;
        }
        $order->total_price = $amount;
        $order->save();

        foreach ($shopping_cart as $item) {
            $product = Product::find($item->id);
            $order_detail = new OrderDetail();
            $order_detail->orderId = $order->id;
            $order_detail->productId = $product->id;
            $order_detail->unitPrice = $product->price;
            $order_detail->quantity = $item->quantity;
            $order_detail->save();
            $this->delete_cart($item->id);
        }
        return view('/admin/order/list');
    }

    public function delete_cart($id)
    {
        $shopping_cart = Session::get('shoppingCart');
        unset($shopping_cart[$id]);
        Session::put('shoppingCart', $shopping_cart);
    }
}
