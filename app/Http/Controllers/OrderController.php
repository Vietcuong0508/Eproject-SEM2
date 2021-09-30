<?php

namespace App\Http\Controllers;

use App\Enums\CheckoutEnum;
use App\Enums\Sort;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->query('sort');
        $search = $request->query('search');
        $status = $request->get('status');
        $query_builder = Order::query();
        $amount = 0;
        foreach (Order::query()->where('isCheckout',CheckoutEnum::PAID)->get() as $item){
            $amount += $item->totalPrice;
        }
        if ($sort && $sort == Sort::SORT_ID_ASC) {
            $query_builder->orderBy('id', 'ASC')->get();
        }
        if ($sort && $sort == Sort::SORT_ID_DESC) {
            $query_builder->orderBy('id', 'DESC')->get();
        }
        if ($sort && $sort == Sort::SORT_CREATED_AT_ASC) {
            $query_builder->orderBy('created_at', 'ASC')->get();
        }
        if ($sort && $sort == Sort::SORT_CREATED_AT_DESC) {
            $query_builder->orderBy('created_at', 'DESC')->get();
        }

        if ($request->member && $request->member == 2){
            $query_builder->where('user_id','=',null);
        }
        if ($request->date_filter && $request->date_filter == 'now'){
            $query_builder->where('created_at','>',Carbon::now()->addDay(-1));
        }
        if ($request->date_filter && $request->date_filter == '7day'){
            $query_builder->where('created_at','>',Carbon::now()->addDay(-7));
        }
        if ($request->date_filter && $request->date_filter == '15day'){
            $query_builder->where('created_at','>',Carbon::now()->addDay(-15));
        }
        if ($request->date_filter && $request->date_filter == '30day'){
            $query_builder->where('created_at','>',Carbon::now()->addDay(-30));
        }

        if ($status == 1) {
            $query_builder = $query_builder->where('status', '=', -1);
        }
        if ($status == 2) {
            $query_builder = $query_builder->where('status', '=', 1);
        }
        if ($status == 3) {
            $query_builder = $query_builder->where('status', '=', 2);
        }
        if ($status == 4) {
            $query_builder = $query_builder->where('status', '=', 3);
        }
        if ($status == 5) {
            $query_builder = $query_builder->where('status', '=', 4);
        }

        $orders = $query_builder->orderBy('id','DESC')->paginate(10);
        return view('admin.order.list', [
            'amount'=>$amount,
            'list' => $orders,
            'key_search' => $search,
            'sort'=>$sort,
            'status'=>$status,
            'date_filter'=>$request->date_filter,
        ]);
    }


    public function show($id)
    {
        $news = Order::where('id', '=', $id)->select('*')->first();
        return view('/admin/order/order-detail', [
            'news' => $news,
        ]);
    }


    public function edit($id)
    {
        $detail = Order::find($id);
        return view('orders/edit', [
            'edit' => $detail
        ]);
    }

    public function update(Request $request, $id)
    {
        $detail = Order::find($id);
        $detail->update($request->all());
        $detail->save();
        return redirect('/admin/list');
    }


    public function destroy($id)
    {
        $detail = Order::find($id);
        $detail->delete();
        return redirect('/admin/list');
    }

    public function update_status(Request $request)
    {
        foreach (json_decode($request->array_id) as $item) {
            $order = Order::find($item);
            $order->status = $request->desire;
            $order->save();
        }
        return back();
    }
}
