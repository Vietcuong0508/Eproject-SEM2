@section('title', 'Order')
@extends('admin.layouts.master')
@section('custom-style')
    <link rel="stylesheet" href="/libs/client/css/bootstrap.min.css">

@endsection
@section('main-content')
    <div class="row main-card mb-3 card">
        <div class="container">
            <div class="card-body">
                <div class=" mb-3">
                    <h4><strong>Đơn hàng #{{$news->id}}</strong></h4>
                    <div class="mb-5">
                        <div>Trạng thái :
                            @switch($news->status)
                                @case(-1)
                                Hủy
                                @case(1)
                                Chờ Xác Nhận
                                @break
                                @case(2)
                                Đã Xác Nhận
                                @break
                                @case(3)
                                Đang Giao Hàng
                                @break
                                @case(4)
                                Hoàn thành
                                @break
                            @endswitch
                        </div>
                        <div>Tên người nhận : {{$news->shipName}}</div>
                        <div>Số điện thoại : {{$news->shipPhone}}</div>
                        <div>Địa chỉ : {{$news->shipAddress}}</div>
                        <div>Ghi chú : {{$news->note}}</div>
                    </div>
                    <?php
                    $totalPrice = 0
                    ?>
                    <table class="mb-0 table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($news->orderDetails as $orderDetail)
                            <?php
                            if (!empty($orderDetail)) {
                                $totalPrice += $orderDetail->unitPrice * $orderDetail->quantity;
                            }
                            ?>
                            <tr class="text-center">
                                <td style="width: 500px">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="{{explode(',',$orderDetail->product->thumbnail)[0]}}" alt=""
                                                 width="60px" height="50px">
                                        </div>
                                        <div class="col-9">
                                            <h6>{{$orderDetail->product->name}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{number_format($orderDetail->product->price)}} đ</td>
                                <td>{{$orderDetail->quantity}}</td>
                                <td>{{number_format($orderDetail->unitPrice*$orderDetail->quantity)}} đ</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4"><strong>Tổng đơn hàng: {{number_format($totalPrice)}} đ</strong></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
@section('custom-js')

@endsection
