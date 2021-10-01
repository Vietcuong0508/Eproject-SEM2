@section('title', 'Thêm Mới Người Dùng')
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
                            <form action="{{route('create-user')}}" method="post">
                                @csrf
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-3 text-uppercase">Đăng Kí</h3>
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
                                        <label class="form-label">Họ Và Tên</label>
                                        <input type="text" class="form-control border-success" name="fullName"
                                               placeholder=" ">
                                        @error('fullName')
                                        <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Số Điện Thoại</label>
                                                <input type="text" class="form-control border-success" name="phone"
                                                       placeholder=" ">
                                            </div>
                                            @error('phone')
                                            <div class="text-danger">* {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Địa Chỉ</label>
                                                <input type="text" class="form-control border-success" name="address"
                                                       placeholder=" ">
                                            </div>
                                            @error('address')
                                            <div class="text-danger">* {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control border-success" name="email"
                                                       placeholder=" ">
                                                @error('email')
                                                <div class="text-danger">* {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Tên Người Dùng</label>
                                                <input type="text" class="form-control border-success" name="username"
                                                       placeholder=" ">
                                                @error('username')
                                                <div class="text-danger">* {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Mật Khẩu</label>
                                                <input type="password" class="form-control border-success" name="password"
                                                       placeholder=" ">
                                                @error('password')
                                                <div class="text-danger">* {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Quyền Hạn</label>
                                                <select name="role" class="form-control border-success">
                                                    <option value="{{\App\Enums\Role::ADMIN}}">Admin</option>
                                                    <option value="{{\App\Enums\Role::USER}}">User</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center px-3">
                                        <button type="submit" class="btn btn-success" style="width: 120px">Gửi</button>
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
