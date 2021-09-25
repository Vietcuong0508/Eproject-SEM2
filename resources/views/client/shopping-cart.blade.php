@section('title', 'Giỏ Hàng')
@extends('client.layouts.master-1')

@section('custom-style')

@endsection

@section('main-content')
    <section class="breadcrumb-section set-bg" data-setbg="/libs/client/img/banner/img.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Sản Phẩm</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Trang Chủ</a>
                            <span>Giỏ Hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class=" pb-5">
        <div class="container-fluid">
            <div class="row">
                <aside class="col-lg-9">
                    @if(session('add'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong>{{session('add')}}
                        </div>
                    @endif
                    @if(session('update'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong>{{session('update')}}
                        </div>
                    @endif
                    @if(session('remove'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong>{{session('remove')}}
                        </div>
                    @endif
                    @if(session('destroy'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong>{{session('destroy')}}
                        </div>
                    @endif
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-borderless table-shopping-cart">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <form action="/update" method="get">
                                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $obj)
                                <tr>
                                    <input type="hidden" name="rowId" value="{{$obj->rowId}}">
                                    <td>
                                        <div class="itemside align-items-center">
                                            <div class="aside"><img src="{{$obj->options->thumbnail}}" class="img-fluid d-none d-md-block rounded mb-2 shadow" width="120px"></div>
                                            <figcaption class="info"> <a href="#" class="title text-dark" data-abc="true"><h4>Product Name:</h4></a>
                                                <p>{{$obj->name}}<br>Garden Name: {{$obj->gardenName}}</p>
                                            </figcaption>
                                        </div>
                                    </td>
                                    <td data-th="Quantity" style="width: 30%">
                                        <input type="number" class="form-control text-center" min="1"
                                               name="quantity" value="{{$obj->qty}}" style="width: 30%">
                                    </td>
                                    <td>
                                        <p class="price">${{$obj->subtotal()}}</p>
                                    </td>
                                    <td class="actions">
                                        <div class="text-right">
                                            <button class="btn btn-primary btn-md mb-2">
                                                <i class="fas fa-sync"></i>
                                            </button>
                                            <a href="/remove/{{$obj->rowId}}"
                                               class="btn btn-danger btn-md mb-2">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </aside>
                <aside class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <dl class="dlist-align">
                                <dt>Quantity:</dt>
                                <dd class="text-right text-dark b ml-3"><strong>{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}</strong></dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Tax:</dt>
                                <dd class="text-right text-dark b ml-3"><strong> {{\Gloudemans\Shoppingcart\Facades\Cart::tax()}}</strong></dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Total:</dt>
                                <dd class="text-right text-dark b ml-3"><strong> ${{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</strong></dd>
                            </dl>
                            <hr> <a href="#" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> Make Purchase </a> <a href="/products" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continue Shopping</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection

@section('custom-js')

@endsection

