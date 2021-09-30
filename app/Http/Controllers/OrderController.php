<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $queryBuilder = Order::query();
        $search = $request->query('search');
        if ($search && strlen($search) > 0) {
            $queryBuilder = $queryBuilder->where('shipName', 'like', '%' . $search . '%');
        }
        $events = $queryBuilder->paginate(10)->appends(['search' => $search]);
        $price = $request->get('total_price');
        $category = $request->get('total_price');
        $price = $request->get('total_price');

        if ($price == 1) {
            $queryBuilder = $queryBuilder->whereBetween('total_price', [0, 20000]);
        }
        if ($price == 2) {
            $queryBuilder = $queryBuilder->whereBetween('total_price', [20000, 50000]);
        }
        if ($price == 3) {
            $queryBuilder = $queryBuilder->whereBetween('total_price', [50000, 100000]);
        }
        if ($price == 4) {
            $queryBuilder = $queryBuilder->where('total_price', '>' ,100000);
        }
        return view('/admin/order/list', [
            'list' => $events,
            'price' => $price
        ]);
    }


    public function show($id)
    {
        $news = Order::where('id', '=', $id)->select('*')->first();
        return view('/admin/order/order-detail', ['news' => $news]);
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
