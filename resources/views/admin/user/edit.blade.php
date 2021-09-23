@section('title', 'User')
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
                        <form action="/update-user/{{$obj->id}}" method="post">
                            @method('put')
                            @csrf
                            <div class="card-body p-md-5 text-black">
                                <h3 class="mb-3 text-uppercase">Sửa Thông Tin Tài Khoản</h3>

                                <div class="form-outline mb-4">
                                    <label class="form-label">Tên Đầy Đủ</label>
                                    <input type="text" class="form-control border-success" name="fullName"
                                           value="{{$obj->fullName}}">
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label">Số Điện Thoại</label>
                                            <input type="text" class="form-control border-success" name="phone"
                                                   value="{{$obj->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label">Địa Chỉ</label>
                                            <input type="text" class="form-control border-success" name="address"
                                                   value="{{$obj->address}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control border-success" name="email"
                                                   value="{{$obj->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label">Tên Người Dùng</label>
                                            <input type="text" class="form-control border-success" name="username"
                                                   value="{{$obj->username}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label">Mật Khẩu</label>
                                            <input type="password" class="form-control border-success" name="password"
                                                   value="{{$obj->password}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label">Quyền Hạn</label>
                                            <select name="permission" class="form-control border-success">
                                                @foreach(App\Enums\Role::getValues() as $type)
                                                    <option {{$obj->type == $type ? 'selected' : ''}} value="{{$type}}">{{App\Enums\Role::getDescription($type)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label">Trạng Thái</label>
                                    <select class="form-control border-success" name="status">
                                        @foreach(App\Enums\UserStatus::getValues() as $type)
                                            <option {{$obj->type == $type ? 'selected' : ''}} value="{{$type}}">{{App\Enums\UserStatus::getDescription($type)}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row justify-content-center px-3">
                                    <button type="submit" class="btn btn-success">Gửi</button>
                                </div>

                            </div>
                        </form>
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
