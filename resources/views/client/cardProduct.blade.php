@section('title', 'Sản Phẩm')
@extends('client.layouts.master-1')
@section('custom-style')
@endsection

@section('main-content')
    <section class="breadcrumb-section set-bg" data-setbg="/libs/client/img/banner/img.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Trang Chủ</a>
                            <span>Giỏ Hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid h-100">
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
                                        <td>{{$products->quantity * $products->price}}</td>

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
{{--                    <div class="col-4">--}}
{{--                        <div class="w3-card-4 rounded">--}}
{{--                            <div class="w3-container" style="background-color: #18a514">--}}
{{--                                <h2>Order</h2>--}}
{{--                            </div>--}}

{{--                            <form class="w3-container" method="post" action="/shopping/order">--}}
{{--                                @csrf--}}
{{--                                <div class="m-0 mt-3">--}}
{{--                                    <label>Name</label>--}}
{{--                                    <input class="w3-input" type="text" name="shipName">--}}
{{--                                </div>--}}
{{--                                <div class="m-0 mt-3">--}}
{{--                                    <label>Phone</label>--}}
{{--                                    <input class="w3-input" type="text" name="shipPhone">--}}
{{--                                </div>--}}
{{--                                <div class="m-0 mt-3">--}}
{{--                                    <label>Address</label>--}}
{{--                                    <input class="w3-input" type="text" name="shipAddress">--}}
{{--                                </div>--}}
{{--                                <div class="m-0 mt-3">--}}
{{--                                    <label>Email</label>--}}
{{--                                    <input class="w3-input" type="text" name="email">--}}
{{--                                </div>--}}
{{--                                <div class="mb-3 mt-3">--}}
{{--                                    <label>Note</label>--}}
{{--                                    <input class="w3-input" type="text" name="note">--}}

{{--                                </div>--}}
{{--                                <h3 class="">Total Price: {{$totalPrice}}</span></h3>--}}
{{--                                <div class="row ml-1">--}}
{{--                                    <button class=" btn btn-success mb-3" style="padding: 8px 143px">Submit Order--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#price').change(function () {
                $('#filter_form').submit()
            })
            $('#gardenName').change(function () {
                $('#filter_form').submit()
            })
            $('#category').change(function () {
                $('#filter_form').submit()
            })
        })
    </script>
@endsection
