@section('title', 'User')
@extends('admin.layouts.master')
@section('custom-style')
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
        @if(session('storeAdmin'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong>{{session('storeAdmin')}}
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
        <table class="table mt-5">
            <thead>
            <tr>
                <th>Họ Và Tên</th>
                <th>Số Điện Thoại</th>
                <th>Email</th>
                <th>Địa Chỉ</th>
                <th>Quền Hạn</th>
                <th class="col-3">Hành Động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $users)
                <tr>
                    <td>{{$users->fullName}}</td>
                    <td>{{$users->phone}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->address}}</td>
                    @if($users->role == 1)
                        <td>User</td>
                    @else
                        <td>Admin</td>
                    @endif
                    <td class="row hidden-phone">
                        <a href="{{route('edit-user', $users->id)}}" style="margin-right: 5px">
                            <button class="btn btn-primary"><i class="fas fa-edit"></i> Sửa</button></a>
                        <form action="{{route('destroy-user', $users->id)}}" method="post" style="float: left">
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
    </div>
@endsection
@section('custom-js')
    <script>

    </script>
@endsection
