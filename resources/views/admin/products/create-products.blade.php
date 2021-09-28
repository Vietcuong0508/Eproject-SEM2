@section('title', 'Product')
@extends('admin.layouts.master')
@section('custom-style')
    <style>

    </style>
@endsection
@section('main-content')
    <section class="h-100">
        <div class="container mt-4 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="col-xl-12">
                            <form action="/create-products" method="post">
                                @csrf
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-3 text-uppercase">Thêm Mới Sản Phẩm</h3>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-outline mb-4">
                                        <label class="form-label">Tên</label>
                                        <input type="text" class="form-control border-success" name="name"
                                               placeholder="">
                                        @error('name')
                                        <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Hình Ảnh</label>
                                                <input type="text" class="form-control border-success" name="thumbnail"
                                                       placeholder=" ">
                                            </div>
                                            @error('thumbnail')
                                            <div class="text-danger">* {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Khối Lượng</label>
                                                <input type="text" class="form-control border-success" name="weight"
                                                       placeholder=" ">
                                            </div>
                                            @error('weight')
                                            <div class="text-danger">* {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Giá</label>
                                                <input type="text" class="form-control border-success" name="price"
                                                       placeholder=" ">
                                                @error('price')
                                                <div class="text-danger">* {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Thể Loại</label>
                                                <select name="category" class="form-control border-success">
                                                    @foreach(App\Enums\Category::getValues() as $type)
                                                        <option value="{{$type}}">{{App\Enums\Category::getDescription($type)}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                <div class="text-danger">* {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline mb-4">
                                                <label class="form-label">Tên Nhà Vườn</label>
                                                <input type="text" class="form-control border-success" name="gardenName"
                                                       placeholder=" ">
                                                @error('gardenName')
                                                <div class="text-danger">* {{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Chất Dinh Dưỡng</label>
                                                <input type="text" class="form-control border-success" name="nutrient"
                                                       placeholder=" ">
                                            </div>
                                            @error('nutrient')
                                            <div class="text-danger">* {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label">Vitamin</label>
                                        <input type="text" class="form-control border-success" name="vitamin"
                                               placeholder="">
                                        @error('vitamin')
                                        <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="row justify-content-center px-3">
                                        <button type="submit" class="btn btn-success">Thêm Mới</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('custom-js')
    <script>

    </script>
@endsection
