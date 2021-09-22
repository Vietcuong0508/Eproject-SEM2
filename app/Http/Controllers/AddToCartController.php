<?php

namespace App\Http\Controllers;

use App\Models\AddToCart;
use Illuminate\Http\Request;

class AddToCartController extends Controller
{

    public function index()
    {
        $list = AddToCart::all();
        return view('/client/shopping-cart', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AddToCart  $addToCart
     * @return \Illuminate\Http\Response
     */
    public function show(AddToCart $addToCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AddToCart  $addToCart
     * @return \Illuminate\Http\Response
     */
    public function edit(AddToCart $addToCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AddToCart  $addToCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddToCart $addToCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddToCart  $addToCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddToCart $addToCart)
    {
        //
    }
}
