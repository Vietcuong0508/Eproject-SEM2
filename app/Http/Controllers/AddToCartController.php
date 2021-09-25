<?php

namespace App\Http\Controllers;

use App\Models\AddToCart;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class AddToCartController extends Controller
{

    public function index()
    {
        $list = AddToCart::all();
        return view('/client/shopping-cart', ['list' => $list]);
    }

    public function add($id){
        $product = Product::find($id);
        Cart::add($product->id,$product->name,1,floatval($product->price),10,['thumbnail' => $product->thumbnail]);
//        return $cart;
        return redirect('/show')->with('add','Thêm mới sản phẩm vào giỏ hàng thành công');
    }
    public function show(){
        return view('/client/shopping-cart');
    }
    public function update(Request $request){
        $id = $request->get('rowId');
        $quantity = $request->get('quantity');
        Cart::update($id,$quantity);
        return redirect('/show')->with('update','Update sản phẩm thành công');
    }
    public function remove($rowId){
        Cart::remove($rowId);
        return redirect('/show')->with('remove','Xóa sản phẩm khỏi giỏ hàng thành công');
    }
    public function destroy(){
        Cart::destroy();
        return redirect('/show')->with('destroy','Xóa tất cả sản phẩm khỏi giỏ hàng thành công');
    }
}
