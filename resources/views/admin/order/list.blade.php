@section('title', 'Order')
@extends('admin.layouts.master')
@section('custom-style')
    <link rel="stylesheet" href="/libs/client/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <style>
        .fixed-table-loading {
            display: none!important;
        }
        td a{
            color: white!important;
        }
        .eye {
            color: white!important;
        }
    </style>
@endsection
@section('main-content')
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-graph">
                            <div class="w3-panel w3-green w3-display-container">
                                <form action="" id="filter_form">
                                    <div class="form-group col-sm-2">
                                        <select name="sort" id="sort" class="form-control sorted">
                                            <option value="" hidden>Sắp xếp</option>
                                            <option
                                                {{$sort ==  \App\Enums\Sort::SORT_CREATED_AT_ASC ? 'selected' : ''}} value="{{\App\Enums\Sort::SORT_CREATED_AT_ASC}}">
                                                Cũ nhất trước
                                            </option>
                                            <option
                                                {{$sort ==  \App\Enums\Sort::SORT_CREATED_AT_DESC ? 'selected' : ''}} value="{{\App\Enums\Sort::SORT_CREATED_AT_DESC}}">
                                                Mới nhất trước
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <select id="status" name="status" class="form-control sorted">
                                            <option selected disabled hidden>Lọc Trạng Thái</option>
                                            <option value="1" {{$status && $status == 1 ? 'selected':''}}>Hủy</option>
                                            <option value="2" {{$status && $status == 2 ? 'selected':''}}>Chờ Xác Nhận</option>
                                            <option value="3" {{$status && $status == 3 ? 'selected':''}}>Đã Xác Nhận</option>
                                            <option value="3" {{$status && $status == 4 ? 'selected':''}}>Đang Chuyển</option>
                                            <option value="3" {{$status && $status == 5 ? 'selected':''}}>Hoàn Thành</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                       data-show-columns="true" data-show-pagination-switch="true"
                                       data-show-refresh="true" data-key-events="true" data-show-toggle="true"
                                       data-resizable="true" data-cookie="true"
                                       data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                       data-toolbar="#toolbar">
                                    <thead>
                                    <tr>
                                        <th class="col-1">Đánh Dấu</th>
                                        <th data-field="id">ID</th>
                                        <th data-field="name" data-editable="true">Tên</th>
                                        <th data-field="email" data-editable="true">Địa Chỉ</th>
                                        <th data-field="phone" data-editable="true">Số Điện Thoại</th>
                                        <th data-field="task" data-editable="true">Tiền</th>
                                        <th data-editable="true">Ngày Đặt Hàng</th>
                                        <th data-field="date" data-editable="true">Trạng Thái</th>
                                        <th data-field="action">Hành Động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list as $obj)
                                        <tr>
                                            <td><input type="checkbox" class="checkbox_choice" value="{{$obj->id}}"></td>
                                            <td>{{$obj->id}}</td>
                                            <td>{{$obj->shipName}}</td>
                                            <td>{{$obj->shipAddress}}</td>
                                            <td>{{$obj->shipPhone}}</td>
                                            <td>{{number_format($obj->total_price)}} VND</td>
                                            <td>{{$obj->created_at}}</td>
                                            <td>{{\App\Enums\StatusEnum::getDescription($obj->status)}}</td>
                                            <td class="datatable-ct">
                                                <a href="/order/{{$obj->id}}"><i class="glyphicon glyphicon-eye-open"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-6">
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
                                    <div class="col-6">
                                        <div style="position: absolute;bottom: 20px">
                                        <span style="margin-right: 30px">Chọn Hàng Loạt <input id="check_all" type="checkbox"
                                                                                          style="transform: translateY(2px)"></span>
                                            <select name="order_status" id="order_status" style="width: 160px;height: 32px">
                                                <option hidden>Thay Đổi Trạng Thái</option>
                                                <option value="{{\App\Enums\StatusEnum::Hủy}}">Hủy</option>
                                                <option value="{{\App\Enums\StatusEnum::Chờ_Xác_Nhận}}">Chờ Xác Nhận</option>
                                                <option value="{{\App\Enums\StatusEnum::Đã_Xác_Nhận}}">Đã Xác Nhận</option>
                                                <option value="{{\App\Enums\StatusEnum::Đang_Giao_Hàng}}">Đang Giao Hàng</option>
                                                <option value="{{\App\Enums\StatusEnum::Hoàn_Thành}}">Hoàn Thành</option>
                                            </select>
                                            <button class="btn btn-primary btn_submit" style="width: 120px">Xác Nhận
                                            </button>
                                            <form action="{{route('update_status')}}" id="form_update_status"
                                                  method="post"
                                                  style="width: 0;height: 0;overflow: hidden!important;">
                                                @csrf
                                                <div style="width: 0;height: 0;overflow: hidden!important;">
                                                    <input type="text" name="array_id" id="array_id">
                                                    <input type="text" name="desire" id="desire">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#check_all').change(function () {
                if ($(this).is(':checked')) {
                    $('.checkbox_choice').prop("checked", true)
                } else {
                    $('.checkbox_choice').prop("checked", false)
                }
            })
            $('#order_status').change(function () {
                $('#desire').val(this.value)
            })
            $('.btn_submit').click(function () {
                var checkboxs = document.querySelectorAll('.checkbox_choice')
                var items = []
                for (let i = 0; i < checkboxs.length; i++) {
                    if (checkboxs[i].checked) {
                        items.push(checkboxs[i].value)
                    }
                }
                $('#array_id').val(JSON.stringify(items))
                if ($('#desire').val() === '') {
                    alert('Vui lòng chọn thao tác để tiếp tục')
                } else {
                    $('#form_update_status').submit()
                }
            })
        })

        document.addEventListener('DOMContentLoaded', function () {
            $('#status').change(function () {
                $('#filter_form').submit()
            })
            $('#sort').change(function () {
                $('#filter_form').submit()
            })
        })
    </script>
@endsection
