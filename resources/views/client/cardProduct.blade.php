@section('title', 'Giỏ Hàng')
@extends('client.layouts.master-1')
@section('custom-style')
@endsection

@section('main-content')

  <span onclick="this.parentElement.style.display='none'"
        class="w3-button w3-large w3-display-topright">&times;</span>
                            <h5 class="text-light p-3">Success! {{session('message')}}</h5>
                        </div>
                    @endif
                    @if(session('remove'))
                        <div class="w3-panel w3-green w3-display-container">
                        <span onclick="this.parentElement.style.display='none'"
                              class="w3-button text-light w3-large w3-display-topright">&times;</span>
                            <h5 class="text-light p-3">Success! {{session('remove')}}</h5>
                        </div>
                    @endif
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-borderless table-shopping-cart">
                                <thead>
                                <tr>
                                    <th style="padding-left: 35px">Sản phẩm</th>
                                    <th>Tên sản Phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Tổng giá</th>
                                    <th>Chỉnh sửa</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $totalPrice = 0;
                                ?>
                                            <td class="actions">
                                                <div>
                                                    <button class="btn btn-primary btn-md mb-2">
                                                        <i class="fas fa-sync"></i>
                                                    </button>
                                                    <a href="/shopping/remove?productId={{$products->id}}"
                                                       class="btn btn-danger btn-md mb-2">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </form>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{--                        <div class="col-4">--}}
                        {{--                            <div class="w3-card-4 rounded">--}}
                        {{--                                <div class="w3-container" style="background-color: #18a514">--}}
                        {{--                                    <h2>Order</h2>--}}
                        {{--                                </div>--}}
                        {{--                                <form class="w3-container" method="post" action="/shopping/order">--}}
                        {{--                                    @csrf--}}
                        {{--                                    <div class="m-0 mt-3">--}}
                        {{--                                        <label>Name</label>--}}
                        {{--                                        <input class="w3-input" type="text" name="shipName">--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="m-0 mt-3">--}}
                        {{--                                        <label>Phone</label>--}}
                        {{--                                        <input class="w3-input" type="text" name="shipPhone">--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="m-0 mt-3">--}}
                        {{--                                        <label>Address</label>--}}
                        {{--                                        <input class="w3-input" type="text" name="shipAddress">--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="m-0 mt-3">--}}
                        {{--                                        <label>Email</label>--}}
                        {{--                                        <input class="w3-input" type="text" name="email">--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="mb-3 mt-3">--}}
                        {{--                                        <label>Note</label>--}}
                        {{--                                        <input class="w3-input" type="text" name="note">--}}

                        {{--                                    </div>--}}
                        {{--                                    <h3 class="">Total Price: {{$totalPrice}}</span></h3>--}}
                        {{--                                    <div class="row ml-1">--}}
                        {{--                                        <button class=" btn btn-success mb-3" style="padding: 8px 143px">Submit Order--}}
                        {{--                                        </button>--}}
                        {{--                                    </div>--}}
                        {{--                                </form>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Chi Tiết Thanh Toán</h4>
                <form method="post" action="/create-payment">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Họ Và Tên<span>*</span></p>
                                        <input type="text" name="shipName">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Địa Chỉ<span>*</span></p>
                                        <input type="text" placeholder="" class="checkout__input__add"
                                               name="shipAddress">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số Điện Thoại<span>*</span></p>
                                        <input type="text" name="shipPhone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Ghi Chú</p>
                                <input type="text" placeholder="" name="note">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
{{--                                    <dl class="dlist-align">--}}
{{--                                        <dt>Số Lượng Sản Phẩm :</dt>--}}
{{--                                        <dd class="text-right text-dark b ml-3">--}}
{{--                                            <strong>{{$products->quantity}}</strong>--}}
{{--                                        </dd>--}}
{{--                                    </dl>--}}
                                    {{--                            <dl class="dlist-align">--}}
                                    {{--                                <dt>Tax:</dt>--}}
                                    {{--                                <dd class="text-right text-dark b ml-3">--}}
                                    {{--                                    <strong> {{\Gloudemans\Shoppingcart\Facades\Cart::tax()}}</strong></dd>--}}
                                    {{--                            </dl>--}}
                                    <dl class="dlist-align">
                                        <dt>Tổng :</dt>
                                        <dd class="text-right text-dark b ml-3"><strong>{{number_format($totalPrice)}} VND</strong>
                                        </dd>
                                    </dl>
                                    <hr>
                                    {{--                                        <div id="paypal-button"></div>--}}
                                    <button class="btn btn-out btn-primary btn-square btn-main">Thực Hiện
                                        Thanh Toán
                                    </button>
                                    <a href="/products"
                                       class="btn btn-out btn-success btn-square btn-main mt-2"
                                       data-abc="true">Tiếp Tục Mua Hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('custom-js')

@endsection
