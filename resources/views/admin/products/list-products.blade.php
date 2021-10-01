@section('title', 'Danh Sách Sản Phẩm')
@extends('admin.layouts.master')
@section('custom-style')

    <link rel="stylesheet" href="/libs/client/css/bootstrap.min.css">

    <style>
        .search-admin {
            background-color: #343a40;
            color: #fff;
            border-color: #6c757d;
            width: 113px;
            height: 20px;
            margin-left: 250px;
        }
        .btn-success {
            height: 25px;
        }
    </style>
@endsection
@section('main-content')
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
            <span onclick="this.parentElement.style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Success!</h3>
            <p>{{session('remove')}}</p>
        </div>
    @endif
    <div class="container">
        @if(session('store'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong>{{session('store')}}
            </div>
        @endif
        @if(session('update'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong>{{session('update')}}
            </div>
        @endif
        @if(session('destroy'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong>{{session('destroy')}}
            </div>
        @endif
        <form action="" id="filter_form">
            <select class="selectpicker" id="price" name="price">
                <option selected disabled hidden>Lọc theo giá</option>
                <option value="1" {{$price && $price == 1 ? 'selected':''}}>0-20.000 VNĐ</option>
                <option value="2" {{$price && $price == 2 ? 'selected':''}}>20.000-50.000 VNĐ</option>
                <option value="3" {{$price && $price == 3 ? 'selected':''}}>50.000-100.000 VNĐ</option>
                <option value="4" {{$price && $price == 4 ? 'selected':''}}>Lớn Hơn 100.000 VNĐ</option>
            </select>
            <select class="selectpicker" id="category" name="category">
                <option selected disabled hidden>Lọc danh mục</option>
                <option value="1" {{$category && $category == 1 ? 'selected':''}}>Rau</option>
                <option value="2" {{$category && $category == 2 ? 'selected':''}}>Củ</option>
                <option value="3" {{$category && $category == 3 ? 'selected':''}}>Quả</option>
            </select>
            <select class="selectpicker" id="gardenName" name="gardenName">
                <option selected disabled hidden>Lọc theo nhà vườn</option>
                <option value="1" {{$gardenName && $gardenName == 1 ? 'selected':''}}>Vườn rau, trái cây sạch bà Họa
                </option>
                <option value="2" {{$gardenName && $gardenName == 2 ? 'selected':''}}>Rau sạch Minh Hiệp
                </option>
                <option value="3" {{$gardenName && $gardenName == 3 ? 'selected':''}}>Nhà Vườn Duy Quang
                </option>
                <option value="4" {{$gardenName && $gardenName == 4 ? 'selected':''}}>Nhà Vườn Quang Huy
                </option>
                <option value="5" {{$gardenName && $gardenName == 5 ? 'selected':''}}>Nhà Vườn Tiến Dũng
                </option>
            </select>
                <input class="search-admin" type="text" name="search" id="search" placeholder="search">
                <button type="submit" class="btn-success">Tìm Kiếm</button>
        </form>
    </div>
    <div class="container">
        <table class="table mt-5">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Hình Ảnh</th>
                <th>Cân Nặng</th>
                <th>Giá</th>
                <th class="col-3">Hành Động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td><img src="{{$product->thumbnail}}" width="60px" height="50px"></td>
                    <td>{{$product->weight}}</td>
                    <td>{{number_format($product->price)}} VND</td>
                    <td class="row hidden-phone">
                        <a href="{{route('edit-product', $product->id)}}" style="margin-right: 5px">
                            <button class="btn btn-primary"><i class="fas fa-edit"></i> Sửa</button>
                        </a>
                        <form action="{{route('destroy-product', $product->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn px-3  btn-danger" href="#" title="Delete"
                                    onclick="return confirm('Are you sure')"><i class="fas fa-trash-alt"></i> Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row align-center">
            @if ($list->lastPage() > 1)
                <ul class="pagination">
                    <li class="{{ ($list->currentPage() == 1) ? ' disabled' : '' }}">
                        <a href="{{ $list->url(1) }}">Trước</a>
                    </li>
                    @for ($i = 1; $i <= $list->lastPage(); $i++)
                        <li class="{{ ($list->currentPage() == $i) ? ' active' : '' }}">
                            <a href="{{ $list->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="{{ ($list->currentPage() == $list->lastPage()) ? ' disabled' : '' }}">
                        <a href="{{ $list->url($list->currentPage()+1) }}">Sau</a>
                    </li>
                </ul>
            @endif
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
