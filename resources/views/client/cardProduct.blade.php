@section('title', 'Giỏ Hàng')
@extends('client.layouts.master-1')
@section('custom-style')
@endsection

@section('main-content')
    <section class=" pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if(session('message'))
                        <div class="w3-panel w3-green w3-display-container">
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
                                @foreach($shoppingCart as $products)
                                    <?php
                                    if (!empty($products)) {
                                        $totalPrice += $products->price * $products->quantity;
                                    }
                                    ?>
                                    <form action="{{route('add')}}" method="get">
                                        <input type="hidden" name="cartAction" value="update">
                                        <input type="hidden" name="productId" value="{{$products->id}}">
                                        <tr>
                                            <td>
                                                <div class="itemside align-items-center">
                                                    <div class="aside"><img src="{{$products->thumbnail}}"
                                                                            class="img-fluid d-none d-md-block rounded shadow"
                                                                            width="120px"></div>
                                                </div>
                                            </td>
                                            <td><h5>{{$products->name}}</h5></td>
                                            <td><input style="outline: none; width: 100px" type="number" min="1"
                                                       name="productQuantity"
                                                       value="{{$products->quantity}}"></td>
                                            <td>{{number_format($products->quantity * $products->price)}} VNĐ</td>

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
                                    <dl class="dlist-align">
                                        <dt>Tổng :</dt>
                                        <dd class="text-right text-dark b ml-3"><strong>{{number_format($totalPrice)}} VND</strong>
                                        </dd>
                                    </dl>
                                    <hr>
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
