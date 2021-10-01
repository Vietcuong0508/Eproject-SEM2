<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{

    public function index()
    {
        $list = Product::paginate(4);
        return view('/client/shop-details', ['item' => $list]);
    }

    public function show($id)
    {
        $news = Product::where('id', '=', $id)->select('*')->first();
        $events = Product::paginate(8);
        return view('/client/shop-details', ['news' => $news, 'list' => $events,]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Detail $detail)
    {
        //
    }

    public function update(Request $request, Detail $detail)
    {
        //
    }

    public function destroy(Detail $detail)
    {
        //
    }
}
