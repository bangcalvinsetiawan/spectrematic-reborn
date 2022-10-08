@extends('dashboard.layouts.main')

@section('content')
    {{-- ShowOrder Modal --}}
    <div class="modal fade" id="listOrderModal" tabindex="-1" aria-labelledby="listOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Pending List Order Limit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="success_message"></div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Signal</th>
                                <th>Price</th>
                                <th>Market</th>
                                <th>Investment</th>
                                <th>Duration</th>
                                <th>Result</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyOrderList">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update_student">Update</button>
                </div>

            </div>
        </div>
    </div>
    {{-- End- ShowOrder Modal --}}

    {{-- Delete Modal --}}
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Confirm to Delete Data ?</h4>
                    <input type="hidden" id="deleteing_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_order">Yes Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End - Delete Modal --}}

    <main class="mt-4">
        <div class="container-fluid px-4">
            <div id="homesho" style="display:non">
            </div>

            <div class="row" id="homeshow" style="display:non">
                <div class="col-xl-12">
                    <div class="card border-primary mb-4">
                    <div class="card-header" style="display:none">
                        <div class="row">
                            <div class="col">
                                <select class="form-select" aria-label="Default Select Market" for="simpleinput" id="cmb_marke"></select>
                            </div>
                            <div class="col">
                                <select id="cmb_time_frame" class="form-select">
                                <!-- <option value="3">3S</option>
                                <option value="5">5S</option>
                                <option value="10">10S</option>
                                <option value="30">30S</option> -->
                                <option value="60">1M</option>
                                <!-- <option value="300" selected>5M</option>
                                <option value="600">10M</option>
                                <option value="900">15M</option> -->
                                </select>
                            </div>
                            <div class="col">
                                <button id="btnGetPrice" class="btn btn-success col-sm-12 mx-auto">Get Market</button>
                            </div>

                        </div>
                    </div>
                    <div class="card-bod position-relative">
                        <iframe src="" style="width: 100%; height: 480px" frameborder="0" id="loaderCC"></iframe>
                        <span id="signal1">
                            <li class=" d-flex justify-content-between align-items-center" style="font-size: 10px; font-weight: bold;color:aqua">
                                Market
                                <div class="col-8">
                                    <select id="cmb_market" class="badge bg-success" style="font-size: 10px;font-weight: bold;height:22px;"> </select>
                                </div>
                            </li>
                                <li class=" d-flex justify-content-between align-items-center" style="font-size: 10px; font-weight: bold;color:aqua">
                                    Signal
                                    <div class="col-8">
                                        <select id="cmb_signal" class="badge bg-success" style="font-size: 10px;font-weight: bold;height:22px;">
                                            <option value="manual">Manual</option>
                                            <option value="timesignaltemplate">Time Signal</option>
                                            <option value="ctpoint"> Reversal</option>
                                            <option value="ctpointF"> Follow Trend</option>
                                            <option value="pattern">Fast signal</option>
                                            <option value="Rul3">Trend signal</option>
                                            {{-- <option value="BL">Buy Limit</option>
                                            <option value="S_Limit">Sell Limit</option>
                                            <option value="B_Stop">Buy Stop</option>
                                            <option value="S_Stop">Sell Stop</option> --}}
                                            <option value="Pending">Pending Order</option>
                                        </select>
                                    </div>
                            </li>
                            </span>
                            <span class="" id="signal" style="display:no">
                                <div class="row mb-2" style="display:none" id="Limit">
                                    <li class=" d-flex justify-content-end align-items-center" style="font-size: 10px; font-weight: bold;color:aqua">
                                        <div class="col-8">
                                                <button id="" class="list_order badge bg-success"data-bs-toggle="modal" data-bs-target="#listOrderModal" style="font-size: 10px;font-weight: bold;height:22px;">LIST ORDER </button>
                                            </div>
                                    </li>
                                    <li class=" d-flex justify-content-between align-items-center" style="font-size: 10px; font-weight: bold;color:aqua">
                                        <b style="display:none" id="SLimit">Sell Limit</b>
                                        <b style="display:none" id="SStop">Sell Stop</b>
                                        <div class="col-8">
                                            <input type="text" id="PointicLB" class="form-control" style="font-size: 12px;font-weight: bold;height:20px;display:none" value='54.00000'>
                                        </div>
                                    </li>
                                    </div>
                                    <div class="form-group"style="display:none" id="Ticpoin">
                                        <li class=" d-flex justify-content-between align-items-center" style="font-size: 10px; font-weight: bold;color:aqua">
                                            Point
                                            <div class="col-8">
                                                <input type="text" id="Pointic" class="form-control" style="font-size: 12px;font-weight: bold;height:20px;" value='50'>
                                            </div>
                                        </li>
                                    </div>
                                    <div class="form-group"style="display:none"id ="Jam">
                                        <textarea class="form-control" id="txtSignalTemplate" rows="4"></textarea>
                                    </div>
                                </span>

                                <span class="d-grid" id="cacing">
                                    <ul class="list-group " style="display:none;" id="trx_atv">
                                        <li class=" d-flex justify-content-between align-items-center" style="font-size: 10px; font-weight: bold;color:aqua">
                                            Trx ID
                                            <span class="badge bg-primary rounded-pill" id="lblTransactionId">00000</span>
                                        </li>
                                        <li class=" d-flex justify-content-between align-items-center" style="font-size: 10px; font-weight: bold;color:aqua">
                                            Investment
                                            <span class="badge bg-primary rounded-pill" id="lblInvest">00000</span>
                                        </li>
                                        <li class=" d-flex justify-content-between align-items-center" style="font-size: 10px; font-weight: bold;color:aqua">
                                            Entry Price
                                            <span class="badge bg-primary rounded-pill" id="lblEntryPrice">00000</span>
                                        </li>
                                        <span class="d-flex justify-content-center" style="font-size: 20px; font-weight: bold;" id="lblTradeStatus"> Wait </span>
                                    </ul>
                                    <span class="d-fle justify-content-center" style=" display:none;font-size: 20px; font-weight: bold;" id="Statu"> Waiting Analysis</span>
                                    <span class="d-flex justify-content-right" style="font-size: 8px; font-weight: bold;color:aqua" id="price_open"> 0000 </span>
                                    <span class="d-flex justify-content-right" style="font-size: 8px; font-weight: bold;color:aqua" id="price_high"> 0000 </span>
                                    <span class="d-flex justify-content-left" style="font-size: 8px; font-weight: bold;color:aqua" id="price_low"> 0000 </span>
                                    <span id="chartline" class="dynamicsparkline" style="height: 50px"></span>
                                    <span class="d-flex justify-content-center" style="font-size: 10px; font-weight: bold;" id="spot3"> 0000 </span>
                                    <span class="d-flex justify-content-center" style="font-size: 10px; font-weight: bold;" id="spot2"> 0000 </span>
                                    <span class="d-flex justify-content-center" style="font-size: 10px; font-weight: bold;" id="spot1"> 0000 </span>
                                    <span class="d-flex justify-content-center" style="font-size: 10px; font-weight: bold;" id="spot"> 0000 </span>
                                    <span class="d-flex justify-content-center" style="font-size: 20px; font-weight: bold;" id="price_point"> 0000 </span>
                                    <span id="chartline" class="dynamicsparklin" style="height: 20px"></span>
                                </span>

                                <span class="" id="btnExecutor" style="display:non">
                                    <div style="display:none" id="Auto">                           <button id="btnStart" class="btn btn-success btn-lg" style="color: white"><span class="fas fa-angle-double-up mr-1"></span>&nbsp;&nbsp;&nbsp;Start&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                    <div style="display:non;" id="man">
                                    <button id="btnCal" class="btn btn-success btn-lg" style="color: white"><span class="fas fa-angle-double-up mr-1"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                    <button id="btnPut" class="btn btn-danger btn-lg"><span class="fas fa-angle-double-down mr-1"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-12" id="settingshow" style="display:none">
                        <div class="card border-primary">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">Investment</label>
                                            <input type="text" id="txt_invest" class="form-control" value='1'>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput"> Duration</label>
                                            <select id="" class="form-control">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">Take Profit</label>
                                            <input type="text" id="txt_takeprofit" class="form-control" value='0'>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">Multiplier</label>
                                            <input type="text" id="txt_muliplier" class="form-control" value='0'>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">Max. Step</label>
                                            <input type="text" id="txt_max_step" class="form-control" value='0'>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">Stop Loss</label>
                                            <input type="text" id="txt_stoploss" class="form-control" value='0'>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">if Loss</label>
                                            <select id="cmb_if_signal_false" class="form-control">
                                                <option value="waitnew">Wait New Signal</option>
                                                <option value="follow">Follow Last Entry</option>
                                                <option value="reversal">Reversal Last Entry</option>
                                                <option value="stop">Stop Trade</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">After Max Step</label>
                                            <select id="cmb_after_step" class="form-control">
                                                <option value="follow">Continue And Reset Investment</option>
                                                <option value="stop">Stop Trade</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6"style="display:non" id="VirtualSistem">
                                        <label class="form-label" for="simpleinput">Virtual Entry System</label>
                                        <select id="lossvirtual" class="form-control">
                                            <option value="">off</option>
                                            <option value="1">ves 1x</option>
                                            <option value="2">ves 2x</option>
                                            <option value="3">ves 3x</option>
                                            <option value="4">ves 4x</option>
                                            <option value="5">ves 5x</option>
                                            <option value="6">ves 6x</option>
                                            <option value="7">ves 7x</option>
                                            <option value="8">ves 8x</option>
                                            <option value="9">ves 9x</option>
                                            <option value="10">ves 10x</option>
                                            <option value="11">ves 11x</option>
                                            <option value="12">ves 12x</option>
                                            <option value="13">ves 13x</option>
                                            <option value="14">ves 14x</option>
                                            <option value="15">ves 15x</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="row" style="margin-bottom:5px">
                                            <div class="form-group">
                                                <label class="form-label" for="simpleinput">Selected Ves</label>
                                                <select id="cmb_Ves" class="form-control">
                                                    <option value="Vesloss">Ves Loss</option>
                                                    <option value="Veswin">Ves Win</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">Selected Loss</label>
                                            <select id="cmb_VesLoss" class="form-control">
                                                <option value="lossC">Loss Continue</option>
                                                <option value="lossV">Loss To Ves</option>

                                            </select>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-md-6 align-middle"><br>
                                        <div  class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch2" checked="">
                                            <label class="custom-control-label" for="customSwitch2">Play Notification Sound</label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="container col-xl-6">
                        <div class="row">

                        </div>
                    </div>
                </div>

            <div class="card border-primary mt-2 mb-4" id="tabprofitshow" style="display:none">
                <div class="card-header">Profit Table</div>
                <div class="card-body">
                    <div class="dataTable-container">
                    <table id="datatablesSimple" class="">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Trx Id</td>
                                <td>Assets</td>
                                <td>Volume</td>
                                <td>Duration</td>
                                <td> Contract</td>
                                <td>Entry Price</td>
                                <td>Exit Price</td>
                                <td>Result</td>
                            </tr>
                        </thead>
                        {{-- <tbody>

                        </tbody> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            fetchorder();
            function fetchorder()
            {
                $.ajax({
                    type: "GET",
                    url: "/fetch-order",
                    dataType: "json",
                    success: function (response) {
                        // console.log(response.orders);
                        $('#tbodyOrderList').html("");
                        $.each(response.orders, function (key, item) {
                            $('tbody').append('<tr>\
                                <td>' + item.id + '</td>\
                                <td>' + item.signal + '</td>\
                                <td>' + item.price + '</td>\
                                <td>' + item.market + '</td>\
                                <td>' + item.investment + '</td>\
                                <td>' + item.duration + '</td>\
                                <td>' + item.result + '</td>\
                                <td><button type="button" value="' + item.id + '" class="badge bg-info border-0 editbtn"><i class="fas fa-edit"></i></button>\
                                <button type="button" value="' + item.id + '" class="badge bg-danger border-0 deletebtn"><i class="fas fa-trash-alt"></i></button></td>\
                            \</tr>');
                        });
                    }
                });
            }

            // $(document).on('click', '.add_student', function (e) {
            //     e.preventDefault();

            //     $(this).text('Sending..');

            //     var data = {
            //         'name': $('.name').val(),
            //         'course': $('.course').val(),
            //         'email': $('.email').val(),
            //         'phone': $('.phone').val(),
            //     }

            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });

            //     $.ajax({
            //         type: "POST",
            //         url: "/students",
            //         data: data,
            //         dataType: "json",
            //         success: function (response) {
            //             // console.log(response);
            //             if (response.status == 400) {
            //                 $('#save_msgList').html("");
            //                 $('#save_msgList').addClass('alert alert-danger');
            //                 $.each(response.errors, function (key, err_value) {
            //                     $('#save_msgList').append('<li>' + err_value + '</li>');
            //                 });
            //                 $('.add_student').text('Save');
            //             } else {
            //                 $('#save_msgList').html("");
            //                 $('#success_message').addClass('alert alert-success');
            //                 $('#success_message').text(response.message);
            //                 $('#AddStudentModal').find('input').val('');
            //                 $('.add_student').text('Save');
            //                 $('#AddStudentModal').modal('hide');
            //                 fetchstudent();
            //             }
            //         }
            //     });

            // });

            // $(document).on('click', '.editbtn', function (e) {
            //     e.preventDefault();
            //     var stud_id = $(this).val();
            //     // alert(stud_id);
            //     $('#editModal').modal('show');
            //     $.ajax({
            //         type: "GET",
            //         url: "/edit-student/" + stud_id,
            //         success: function (response) {
            //             if (response.status == 404) {
            //                 $('#success_message').addClass('alert alert-success');
            //                 $('#success_message').text(response.message);
            //                 $('#editModal').modal('hide');
            //             } else {
            //                 // console.log(response.student.name);
            //                 $('#name').val(response.student.name);
            //                 $('#course').val(response.student.course);
            //                 $('#email').val(response.student.email);
            //                 $('#phone').val(response.student.phone);
            //                 $('#stud_id').val(stud_id);
            //             }
            //         }
            //     });
            //     $('.btn-close').find('input').val('');

            // });

            // $(document).on('click', '.update_student', function (e) {
            //     e.preventDefault();

            //     $(this).text('Updating..');
            //     var id = $('#stud_id').val();
            //     // alert(id);

            //     var data = {
            //         'name': $('#name').val(),
            //         'course': $('#course').val(),
            //         'email': $('#email').val(),
            //         'phone': $('#phone').val(),
            //     }

            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });

            //     $.ajax({
            //         type: "PUT",
            //         url: "/update-student/" + id,
            //         data: data,
            //         dataType: "json",
            //         success: function (response) {
            //             // console.log(response);
            //             if (response.status == 400) {
            //                 $('#update_msgList').html("");
            //                 $('#update_msgList').addClass('alert alert-danger');
            //                 $.each(response.errors, function (key, err_value) {
            //                     $('#update_msgList').append('<li>' + err_value +
            //                         '</li>');
            //                 });
            //                 $('.update_student').text('Update');
            //             } else {
            //                 $('#update_msgList').html("");

            //                 $('#success_message').addClass('alert alert-success');
            //                 $('#success_message').text(response.message);
            //                 $('#editModal').find('input').val('');
            //                 $('.update_student').text('Update');
            //                 $('#editModal').modal('hide');
            //                 fetchstudent();
            //             }
            //         }
            //     });

            // });

            $(document).on('click', '.deletebtn', function () {
                var ord_id = $(this).val();
                $('#DeleteModal').modal('show');
                $('#deleteing_id').val(ord_id);
            });

            $(document).on('click', '.delete_order', function (e) {
                e.preventDefault();

                $(this).text('Deleting..');
                var id = $('#deleteing_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: "/delete-order/" + id,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_student').text('Yes Delete');
                        } else {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_student').text('Yes Delete');
                            $('#DeleteModal').modal('hide');
                            fetchorder();
                        }
                    }
                });
            });

        });

    </script>

@endsection
