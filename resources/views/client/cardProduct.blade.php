@section('title', 'Sản Phẩm')
@extends('client.layouts.master-1')
@section('custom-style')
@endsection

@section('main-content')

    <div class="container-fluid h-100">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-borderless table-shopping-cart">
                            <thead>
                            @if(session('message'))
                                <div class="w3-panel w3-green w3-display-container">
  <span onclick="this.parentElement.style.display='none'"
        class="w3-button w3-large w3-display-topright">&times;</span>
                                    <h3>Success!</h3>
                                    <p>{{session('message')}}</p>
                                </div>
                            @endif
                            @if(session('remove'))
                                <div class="w3-panel w3-green w3-display-container">
                        <span onclick="this.parentElement.style.display='none'"
                              class="w3-button w3-large w3-display-topright">&times;</span>
                                    <h3>Success!</h3>
                                    <p>{{session('remove')}}</p>
                                </div>
                            @endif
                            <tr>
                                <th>Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th></th>
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
                                                                        class="img-fluid d-none d-md-block rounded mb-2 shadow"
                                                                        width="120px"></div>
                                                <figcaption class="info"><a href="#" class="title text-dark"
                                                                            data-abc="true"><h4>Tên Sản Phẩm:</h4>
                                                    </a>
                                                    <p>{{$products->name}}</p>
{{--                                                    <br>Tên Nhà Vườn: {{$products->gardenName}}--}}
                                                </figcaption>
                                            </div>
                                        </td>
                                        <td>{{number_format($products->price)}} VND</td>
                                        <td data-th="Quantity" style="width: 30%">
                                            <input type="number" class="form-control text-center" min="1"
                                                   name="quantity" value="{{$products->quantity}}" style="width: 30%">
                                        </td>
                                        <td>
                                            <p class="price">{{number_format($products->price * $products->quantity)}} VND</p>
                                        </td>
                                        <th>
                                            <button class="btn btn-primary m-2 d-block" style="font-size: 15px"><i
                                                    class="fas fa-edit"></i>
                                                Update
                                            </button>
                                            <a class="btn btn-danger m-2"
                                               href="/shopping/remove?productId={{$products->id}}"
                                               onclick="return confirm('Ban co muon xoa?')">
                                                <i class="fas fa-trash-alt"></i>
                                                Remove
                                            </a>
                                        </th>
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
