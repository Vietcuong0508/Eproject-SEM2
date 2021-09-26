@section('title', 'Order')
@extends('admin.layouts.master')
@section('custom-style')
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row" style="margin-left: 150px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Projects <span class="table-project-n">Data</span> Table</h1>
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
                                        <th>Check</th>
                                        <th data-field="id">ID</th>
                                        <th data-field="name" data-editable="true">Name</th>
                                        <th data-field="email" data-editable="true">Address</th>
                                        <th data-field="phone" data-editable="true">Phone</th>
                                        <th data-field="task" data-editable="true">Total Price</th>
                                        <th data-editable="true">Order Date</th>
                                        <th data-field="date" data-editable="true">Status</th>
                                        <th data-field="action">Action</th>
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
                                            <td>{{$obj->total_price}}</td>
                                            <td>{{$obj->created_at}}</td>
                                            <td>{{\App\Enums\StatusEnum::getDescription($obj->status)}}</td>
                                            <td class="datatable-ct"><i class="fa fa-check"></i>
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
                                                    <a href="{{ $list->url(1) }}">Previous</a>
                                                </li>
                                                @for ($i = 1; $i <= $list->lastPage(); $i++)
                                                    <li class="{{ ($list->currentPage() == $i) ? ' active' : '' }}">
                                                        <a href="{{ $list->url($i) }}">{{ $i }}</a>
                                                    </li>
                                                @endfor
                                                <li class="{{ ($list->currentPage() == $list->lastPage()) ? ' disabled' : '' }}">
                                                    <a href="{{ $list->url($list->currentPage()+1) }}">Next</a>
                                                </li>
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <div style="position: absolute;bottom: 20px">
                                        <span style="margin-right: 30px">Check all <input id="check_all" type="checkbox"
                                                                                          style="transform: translateY(2px)"></span>
                                            <select name="order_status" id="order_status" style="width: 130px">
                                                <option hidden>Change status</option>
                                                <option value="{{\App\Enums\StatusEnum::Cancel}}">Cancel</option>
                                                <option value="{{\App\Enums\StatusEnum::Waiting}}">Waiting</option>
                                                <option value="{{\App\Enums\StatusEnum::Confirmed}}">Confirmed</option>
                                                <option value="{{\App\Enums\StatusEnum::Shipping}}">Shipping</option>
                                                <option value="{{\App\Enums\StatusEnum::Done}}">Done</option>
                                            </select>
                                            <button class="btn btn-primary btn_submit" style="width: 120px">Apply
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
    </script>
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
