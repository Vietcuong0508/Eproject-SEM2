@section('title', 'Đăng Ký')
@extends('client.layouts.master-1')
@section('custom-style')

@endsection

@section('main-content')
    <section style="background-color: #eae9e9">
        <div class="container mt-4 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img
                                    src="/libs/client/img/img-form.jpg"
                                    width="525px" height="650px"
                                />
                            </div>

                            <div class="col-xl-6">

                                <form action="{{ route('postRegister') }}" method="post">
                                    @csrf
                                    <div class="card-body p-md-5 text-black">
                                        <h3 class="mb-3 text-uppercase text-center">Đăng Ký</h3>
                                        @if(session('success'))
                                            <div class="text-danger" style="font-weight: bold; margin-bottom: 10px;">
                                                {{session('success')}}
                                            </div>
                                        @endif
                                        <div class="form-outline mb-4">
                                            <label class="form-label">Họ và tên</label>
                                            <input type="text" class="form-control border-success" name="fullName" placeholder=" ">
                                            @error('fullName')
                                            <div class="text-danger">* {{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label">Số điện thoại</label>
                                                    <input type="text" class="form-control border-success" name="phone"
                                                           placeholder=" ">
                                                </div>
                                                @error('phone')
                                                <div class="text-danger">* {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label">Địa chỉ</label>
                                                    <input type="text" class="form-control border-success" name="address"
                                                           placeholder=" ">
                                                </div>
                                                @error('address')
                                                <div class="text-danger">* {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control border-success" name="email" placeholder=" ">
                                            @error('email')
                                            <div class="text-danger">* {{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label">Tài khoản</label>
                                            <input type="text" class="form-control border-success" name="username"
                                                   placeholder=" ">
                                            @error('username')
                                            <div class="text-danger">* {{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label">Mật khẩu</label>
                                            <input type="password" class="form-control border-success" name="password"
                                                   placeholder=" ">
                                            @error('password')
                                            <div class="text-danger">* {{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="row justify-content-center px-3">
                                            <button type="submit" class="btn-block btn-submit">Gửi</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom-js')

@endsection
