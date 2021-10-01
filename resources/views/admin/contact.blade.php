@section('title', 'Liên Hệ')
@extends('admin.layouts.master')
@section('custom-style')
    <style>
        .fixed-table-loading {
            display: none!important;
        }

        td a{
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
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Liên Hệ Của Khách Hàng</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
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
                                        <th data-field="email" data-editable="true">Email</th>
                                        <th data-field="task" data-editable="true">Lời Nhắn</th>
                                        <th data-field="phone" data-editable="true" class="col-2">Trạng Thái</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list as $obj)
                                        <tr>
                                            <td><input type="checkbox" class="checkbox_choice" value="{{$obj->id}}"></td>
                                            <td>{{$obj->id}}</td>
                                            <td>{{$obj->name}}</td>
                                            <td>{{$obj->email}}</td>
                                            <td>{{$obj->note}}</td>
                                            <td>{{\App\Enums\Contact::getDescription($obj->status)}}</td>
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
                                    <div class="col-6" style="margin-top: 10px">
                                        <div style="position: absolute;bottom: 20px">
                                        <span style="margin-right: 30px">Đánh dấu tất cả <input id="check_all" type="checkbox"
                                                                                          style="transform: translateY(2px)"></span>
                                            <select name="contact_status" id="contact_status" style="width: 170px;height: 32px">
                                                <option hidden>Thay Đổi Trạng Thái</option>
                                                <option value="{{\App\Enums\Contact::Chờ_Phản_Hồi}}">Chờ Phản Hồi</option>
                                                <option value="{{\App\Enums\Contact::Đã_Phản_Hồi}}">Đã Phản Hồi</option>
                                            </select>
                                            <button class="btn btn-primary btn_submit" style="width: 120px">Xác Nhận
                                            </button>
                                            <form action="{{route('contact_status')}}" id="form_update_status"
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
            $('#contact_status').change(function () {
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
    </script>
@endsection
