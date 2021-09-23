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
                            <form action="/update-products/{{$edit->id}}" method="post">
                                @method('put')
                                @csrf
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-3 text-uppercase">Thêm Mới Sản Phẩm</h3>

                                    <div class="form-outline mb-4">
                                        <label class="form-label">Tên</label>
                                        <input type="text" class="form-control border-success" name="name"
                                               placeholder="" value="{{$edit->name}}">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Hình Ảnh</label>
                                                <input type="text" class="form-control border-success" name="thumbnail"
                                                       placeholder=" " value="{{$edit->thumbnail}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Khối Lượng</label>
                                                <input type="text" class="form-control border-success" name="weight"
                                                       placeholder=" " value="{{$edit->weight}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Giá</label>
                                                <input type="text" class="form-control border-success" name="price"
                                                       placeholder=" " value="{{$edit->price}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Thể Loại</label>
                                                <input type="text" class="form-control border-success" name="category"
                                                       placeholder=" " value="{{$edit->category}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline mb-4">
                                                <label class="form-label">Tên Nhà Vườn</label>
                                                <input type="text" class="form-control border-success" name="gardenName"
                                                       placeholder=" " value="{{$edit->gardenName}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Chất Dinh Dưỡng</label>
                                                <input type="text" class="form-control border-success" name="nutrient"
                                                       placeholder=" " value="{{$edit->nutrient}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label">Vitamin</label>
                                        <input type="text" class="form-control border-success" name="vitamin"
                                               placeholder="" value="{{$edit->vitamin}}">
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
