{{--@section('title', 'Giỏ Hàng')--}}
{{--@extends('client.layouts.master-1')--}}

{{--@section('custom-style')--}}

{{--@endsection--}}

{{--@section('main-content')--}}
{{--    <section class="breadcrumb-section set-bg" data-setbg="/libs/client/img/banner/img.png">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12 text-center">--}}
{{--                    <div class="breadcrumb__text">--}}
{{--                        <h2>Sản Phẩm</h2>--}}
{{--                        <div class="breadcrumb__option">--}}
{{--                            <a href="/">Trang Chủ</a>--}}
{{--                            <span>Giỏ Hàng</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <section class=" pb-5">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <aside class="col-lg-12">--}}
{{--                    @if(session('add'))--}}
{{--                        <div class="alert alert-success alert-dismissible">--}}
{{--                            <button type="button" class="close" data-dismiss="alert">&times;</button>--}}
{{--                            <strong>Success!</strong>{{session('add')}}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    @if(session('update'))--}}
{{--                        <div class="alert alert-success alert-dismissible">--}}
{{--                            <button type="button" class="close" data-dismiss="alert">&times;</button>--}}
{{--                            <strong>Success!</strong>{{session('update')}}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    @if(session('remove'))--}}
{{--                        <div class="alert alert-success alert-dismissible">--}}
{{--                            <button type="button" class="close" data-dismiss="alert">&times;</button>--}}
{{--                            <strong>Success!</strong>{{session('remove')}}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    @if(session('destroy'))--}}
{{--                        <div class="alert alert-success alert-dismissible">--}}
{{--                            <button type="button" class="close" data-dismiss="alert">&times;</button>--}}
{{--                            <strong>Success!</strong>{{session('destroy')}}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <div class="card">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="table table-borderless table-shopping-cart">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>Sản Phẩm</th>--}}
{{--                                    <th>Số Lượng</th>--}}
{{--                                    <th>Giá</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <form action="/shopping/save" method="get">--}}
{{--                                    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $obj)--}}
{{--                                        <tr>--}}
{{--                                            <input type="hidden" name="rowId" value="{{$obj->rowId}}">--}}
{{--                                            <td>--}}
{{--                                                <div class="itemside align-items-center">--}}
{{--                                                    <div class="aside"><img src="{{$obj->options->thumbnail}}"--}}
{{--                                                                            class="img-fluid d-none d-md-block rounded mb-2 shadow"--}}
{{--                                                                            width="120px"></div>--}}
{{--                                                    <figcaption class="info"><a href="#" class="title text-dark"--}}
{{--                                                                                data-abc="true"><h4>Tên Sản Phẩm:</h4>--}}
{{--                                                        </a>--}}
{{--                                                        <p>{{$obj->name}}<br>Tên Nhà Vườn: {{$obj->gardenName}}</p>--}}
{{--                                                    </figcaption>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td><input style="outline: none; width: 150px" type="number" min="1"--}}
{{--                                                       name="productQuantity"--}}
{{--                                                       value="{{$products->quantity}}"></td>--}}
{{--                                            <td>{{number_format($products->quantity * $products->price)}} VNĐ</td>--}}
{{--                                            <td class="actions">--}}
{{--                                                <div class="text-right">--}}
{{--                                                    <button class="btn btn-primary btn-md mb-2">--}}
{{--                                                        <i class="fas fa-sync"></i>--}}
{{--                                                    </button>--}}
{{--                                                    <a href="/remove/{{$obj->rowId}}"--}}
{{--                                                       class="btn btn-danger btn-md mb-2">--}}
{{--                                                        <i class="fas fa-trash"></i>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                </form>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </aside>--}}
{{--                <aside class="col-lg-3">--}}
{{--                </aside>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <section class="checkout spad">--}}
{{--        <div class="container">--}}
{{--            <div class="checkout__form">--}}
{{--                <h4>Chi Tiết Thanh Toán</h4>--}}
{{--                <form method="post" action="/shopping/order" id="demoForm">--}}
{{--                    @csrf--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-8 col-md-6">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="checkout__input">--}}
{{--                                        <p>Họ Và Tên<span>*</span></p>--}}
{{--                                        <input type="text" name="shipName">--}}
{{--                                        @error('shipName')--}}
{{--                                        <div class="text-danger">* {{ $message }}</div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="checkout__input">--}}
{{--                                        <p>Địa Chỉ<span>*</span></p>--}}
{{--                                        <input type="text" placeholder="" class="checkout__input__add"--}}
{{--                                               name="shipAddress">--}}
{{--                                        @error('shipAddress')--}}
{{--                                        <div class="text-danger">* {{ $message }}</div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="checkout__input">--}}
{{--                                        <p>Số Điện Thoại<span>*</span></p>--}}
{{--                                        <input type="text" name="shipPhone">--}}
{{--                                        @error('shipPhone')--}}
{{--                                        <div class="text-danger">* {{ $message }}</div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="checkout__input">--}}
{{--                                        <p>Email<span></span></p>--}}
{{--                                        <input type="text" name="email">--}}
{{--                                        @error('email')--}}
{{--                                        <div class="text-danger">* {{ $message }}</div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="checkout__input">--}}
{{--                                <p>Ghi Chú</p>--}}
{{--                                <input type="text" placeholder="" name="note">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4 col-md-6">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body">--}}
{{--                                    <dl class="dlist-align">--}}
{{--                                        <dt>Số Lượng Sản Phẩm :</dt>--}}
{{--                                        <dd class="text-right text-dark b ml-3">--}}
{{--                                            <strong>{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}</strong></dd>--}}
{{--                                    </dl>--}}
{{--                                    --}}{{--                            <dl class="dlist-align">--}}
{{--                                    --}}{{--                                <dt>Tax:</dt>--}}
{{--                                    --}}{{--                                <dd class="text-right text-dark b ml-3">--}}
{{--                                    --}}{{--                                    <strong> {{\Gloudemans\Shoppingcart\Facades\Cart::tax()}}</strong></dd>--}}
{{--                                    --}}{{--                            </dl>--}}
{{--                                    <dl class="dlist-align">--}}
{{--                                        <dt>Tổng :</dt>--}}
{{--                                        <dd class="text-right text-dark b ml-3"><strong>--}}
{{--                                                {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}} VND</strong></dd>--}}
{{--                                    </dl>--}}
{{--                                    <hr>--}}
{{--                                    <button type="submit" class="btn btn-out btn-primary btn-square btn-main">Thực Hiện--}}
{{--                                        Thanh Toán--}}
{{--                                    </button>--}}
{{--                                    <a href="/products" class="btn btn-out btn-success btn-square btn-main mt-2"--}}
{{--                                       data-abc="true">Tiếp Tục Mua Hàng</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <script>--}}
{{--        $().ready(function() {--}}
{{--            $("#demoForm").validate({--}}
{{--                onfocusout: false,--}}
{{--                onkeyup: false,--}}
{{--                onclick: false,--}}
{{--                rules: {--}}
{{--                    "shipName": {--}}
{{--                        required: true,--}}
{{--                        maxlength: 15--}}
{{--                    },--}}
{{--                    "shipAddress": {--}}
{{--                        required: true,--}}
{{--                        minlength: 8--}}
{{--                    },--}}
{{--                    "shipPhone": {--}}
{{--                        required: true,--}}
{{--                        minlength: 8--}}

{{--                    },--}}
{{--                    "email": {--}}
{{--                        required: true,--}}
{{--                        minlength: 8--}}

{{--                    }--}}
{{--                },--}}
{{--                messages: {--}}
{{--                    "shipName": {--}}
{{--                        required: "Bắt buộc nhập username",--}}
{{--                        maxlength: "Hãy nhập tối đa 15 ký tự"--}}
{{--                    },--}}
{{--                    "shipAddress": {--}}
{{--                        required: "Bắt buộc nhập password",--}}
{{--                        minlength: "Hãy nhập ít nhất 8 ký tự"--}}
{{--                    },--}}
{{--                    "shipPhone": {--}}
{{--                        required: "Bắt buộc nhập password",--}}
{{--                        minlength: "Hãy nhập ít nhất 8 ký tự"--}}
{{--                    },--}}
{{--                    "email": {--}}
{{--                        required: "Bắt buộc nhập password",--}}
{{--                        minlength: "Hãy nhập ít nhất 8 ký tự"--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}

{{--@section('custom-js')--}}

{{--@endsection--}}

