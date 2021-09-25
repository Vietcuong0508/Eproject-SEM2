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
            $queryBuilder = $queryBuilder->where('shipName', 'like', '%' .$search. '%');
        }
        $events = $queryBuilder->paginate(10)->appends(['search' => $search]);
        return view('orders/list', [
            'list' => $events,
        ]);
    }


    public function show(Order $order)
    {
        //
    }


    public function edit($id)
    {
        $detail = Order::find($id);
        return view('orders/edit', [
            'edit'=>$detail
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

    public function update_status(Request $request){
        foreach (json_decode($request->array_id) as $item){
            $order = Order::find($item);
            $order->status = $request->desire;
            $order->save();
        }
        return back();
    }
}
