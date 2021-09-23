@section('title', 'Product')
@extends('admin.layouts.master')
@section('custom-style')

    <link rel="stylesheet" href="/libs/client/css/bootstrap.min.css">

    <style>

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
        <table class="table mt-5">
            <thead>
            <tr>
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
                    <td>{{$product->name}}</td>
                    <td><img src="{{$product->thumbnail}}" width="60px"></td>
                    <td>{{$product->weight}}</td>
                    <td>{{$product->price}}</td>
                    <td class="row hidden-phone">
                        <a href="/edit-products/{{$product->id}}" style="margin-right: 5px">
                            <button class="btn btn-primary"><i class="fas fa-edit"></i> Sửa</button>
                        </a>
                        <form action="/destroy-products/{{$product->id}}" method="post">
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

    </script>
@endsection
