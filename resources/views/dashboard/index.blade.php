@extends('dashboard.layouts.main')

@section('content')

{{-- <span>{{ $order }}</span> --}}
<!-- Modal -->
<div class="modal fade" id="addOrderModal" tabindex="-1" aria-labelledby="addOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content" style="width:900px">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-12">

                        <div id="success_message"></div>

                        <div class="card">
                            <div class="card-header">
                                <h4>

                                    order Data
                                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                        data-bs-target="#AddStudentModal">Add Order</button>
                                </h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Signal</th>
                                      <th>Price</th>
                                      <th>Market</th>
                                      <th>Investment</th>
                                      <th>Duration</th>
                                      <th>Result</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                    <tbody>
                                      @foreach ($orders as $order )
                                      <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->signal }}</td>
                                        <td>{{ $order->price }}</td>
                                        <td>{{ $order->market }}</td>
                                        <td>{{ $order->investment }}</td>
                                        <td>{{ $order->duration }}</td>

                                        <td>Result</td>
                                        <td>

                                          {{-- <button type="button" href="/order/{{ $order->id }}/edit" class="badge bg-info border-0" data-bs-toggle="modal" data-bs-target="#editOrderModal" data-id='{{ $order->id }}'><i class="fas fa-edit"></i></button> --}}

                                          <a type="button" href="/order/{{ $order->id }}/edit" class="badge bg-info" id="edit_market"><i class="fas fa-edit"></i></a>

                                          <form action="/order/{{ $order->id }}" method="post" class="d-inline">
                                              @csrf
                                              @method('delete')
                                              <button href="" class="badge bg-danger border-0"><i class="fas fa-trash-alt"></i></i></button>
                                          </form>
                                        </td>
                                      </tr>

                                      @endforeach
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </div>
</div>
<div class="modal fade" id="lisOrderModal" tabindex="-1" aria-labelledby="addOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">list</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        ...
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </div>
</div>

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
                                    {{-- point --}}
                                    {{-- <div class="col-8"> --}}
                                        {{-- <select id="PointLimit" class="badge bg-success" style="font-size: 10px;font-weight: bold;height:22px;">
                                            <option value="0.0001">1 Point</option>
                                            <option value="0.001">10 point</option>
                                            <option value="0.01">100 Point</option>
                                            <option value="0.1">1000 Point</option>
                                        </select> --}}
                                        <div class="col-8">
                                            <button id="" class="badge bg-success"data-bs-toggle="modal" data-bs-target="#addOrderModal" style="font-size: 10px;font-weight: bold;height:22px;">LIS ORDER </button>
                                        </div>
                                        {{-- <button id="PointLimit" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#addOrderModal" style="font-size: 12px;font-weight: bold;height:20px;">
                                            Add
                                        </button>
                                        <button class="badge bg-success" data-bs-toggle="modal" data-bs-target="#lisOrderModal"style="font-size: 10px;font-weight: bold;height:25px;">
                                            List
                                        </button> --}}
                                    {{-- </div> --}}
                                </li>
                                {{-- <li class=" d-flex justify-content-between align-items-center" style="font-size: 10px; font-weight: bold;color:aqua">
                                    <b style="display:non" id="BLimit">Buy Limit</b>
                                    <b style="display:non" id="BStop">Buy Stop</b>
                                    <div class="col-8">
                                        <input type="text" id="PointicLS" class="form-control" style="font-size: 12px;font-weight: bold;height:20px;display:non" value='54.00000'>
                                    </div>
                                </li> --}}
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
                {{-- <table id="#">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Signal</th>
                        <th>Price</th>
                        <th>Market</th>
                        <th>Investment</th>
                        <th>Duration</th>
                        <th>Result</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody> --}}
                        @foreach ($orders as $order )
                        {{-- <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $order->signal }}</td>
                          <td>{{ $order->price }}</td>
                          <td>{{ $order->market }}</td>
                          <td>{{ $order->investment }}</td>
                          <td>{{ $order->duration }}</td>

                          <td>Result</td>
                          <td> --}}

                            {{-- <button type="button" href="/order/{{ $order->id }}/edit" class="badge bg-info border-0" data-bs-toggle="modal" data-bs-target="#editOrderModal" data-id='{{ $order->id }}'><i class="fas fa-edit"></i></button> --}}

                            {{-- <a type="button" href="/order/{{ $order->id }}/edit" class="badge bg-info"><i class="fas fa-edit"></i></a>

                            <form action="/order/{{ $order->id }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button href="" class="badge bg-danger border-0"><i class="fas fa-trash-alt"></i></i></button>
                            </form>
                          </td>
                        </tr> --}}

                        @endforeach
                    </tbody>
                  </table>
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
                            <!-- <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="simpleinput">Signal</label>
                                        <select id="cmb_signal" class="form-control">
                                            <option value="manual">Manual</option>
                                            <option value="timesignaltemplate">Time Signal</option>
                                            <option value="ctpoint"> Reversal</option>
                                            <option value="ctpointF"> Follow Trend</option>
                                            <option value="pattern">fast signal</option>
                                            <option value="Rul3">Three signal</option>
                                            <option value="Xspott">Limit</option>

                                        </select>
                                    </div>
                                </div>-->
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

                    <!--  <div class="col-xl-6 col-md-6">
                            <div class="card border-primary mb-4 text-center">
                            <div class="card-header">If everything is ready</div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <button id="btnStart" class="btn btn-dark col-sm-12 mx-auto">Start</button>
                            </div>
                            </div>
                        </div>-->

                    <!-- <div class="col-xl-6 col-md-6">
                            <div class="form-control text-white mb-4">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                Trx ID
                                <span class="badge bg-primary rounded-pill" id="lblTransactionId">00000</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                Investment
                                <span class="badge bg-primary rounded-pill" id="lblInvest">00000</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                Contract
                                <span class="badge bg-primary rounded-pill" id="lblContract">N/A</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                Entry Price
                                <span class="badge bg-primary rounded-pill" id="lblEntryPrice">00000</span>
                                </li>
                            </ul>
                            </div>
                        </div>-->
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
                            <td> Result</td>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    </table>
                </div>
                <div class="dataTable-bottom">
                    <div class="dataTable-info">

                    </div>
                    <nav class="dataTable-pagination">
                        <ul class="dataTable-pagination-list"></ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="AddStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddStudentModalLabel">Add  order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <ul id="save_msgList"></ul>

                    <div class="form-group mb-3">
                        <label for="">Order Limit</label>
                        {{-- <input type="text" required class="name form-control"> --}}
                        <select class="form-select" name="signal" id="inputSignal">
                          <option value="BUY LIMIT">BUY LIMIT</option>
                          <option value="BUY STOP">BUY STOP</option>
                          <option value="SELL LIMIT">SELL LIMIT</option>
                          <option value="SELL STOP">SELL STOP</option>
                      </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Price</label>
                        {{-- <input type="text" required class="course form-control"> --}}
                        <div class="input-group">

                      <span class="input-group-text" id='xspot'>00.000</span>
                      <input type="number" step="0.0000000001" class="form-control @error('price') is-invalid @enderror" name="price" id="inputPrice" aria-label="Input Price" required>
                      @error('price')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Select Market</label>
                        {{-- <input type="text" required class="email form-control"> --}}
                        <select type="text" class="form-select" name="market" id="cmb_marketlis" aria-label="Select Market">
                          {{-- <option value="1">EPIC5000</option>
                          <option value="2">EPIC3000</option>
                          <option value="3">EPIC1000</option>
                          <option value="4">APPLE</option> --}}
                      </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">investment</label>
                        {{-- <input type="text" required class="phone form-control"> --}}
                        <div class="input-group">
                        <span class="input-group-text">$</span>
                  <input type="number" step="0.001" class="form-control @error('investment') is-invalid @enderror" name="investment" id="txt_inves" aria-label="Input Investment" required>
                  @error('price')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                    </div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="">Trade Duration</label>
                      {{-- <input type="text" required class="email form-control"> --}}
                      <select type="text" class="form-select" name="duration" id="cmb_time_fram" aria-label="Select Market">
                        <option value="1s">1s</option>
                        <option value="3s">3s</option>
                        <option value="5s">5s</option>
                        <option value="10s">10s</option>
                        <option value="30s">30s</option>
                        <option value="60s">60s</option>
                        <option value="5m">5m</option>
                        <option value="10m">10m</option>
                        <option value="15m">15m</option>
                        <option value="20m">20m</option>
                        <option value="25m">25m</option>
                        <option value="30m">30m</option>
                        <option value="35m">35m</option>
                        <option value="40m">40m</option>
                        <option value="45m">45m</option>
                        <option value="50m">50m</option>
                        <option value="55m">55m</option>
                        <option value="60m">60m</option>
                        <option value="1d">1d</option>
                        <option value="EOC1M">EOC1M</option>
                        <option value="EOC5M">EOC5M</option>
                        <option value="EOC15M">EOC15M</option>
                        <option value="EOC30M">EOC30M</option>
                    </select>
                  </div>
          </div>
          <form method="post" action="/order">
              @csrf

              {{-- <div class="form-group mb-3">
                  <label for="inputSignal" class="form-label">Order Limit</label>
                  <select class="form-select" name="signal" id="inputSignal">
                      <option value="BUY LIMIT">BUY LIMIT</option>
                      <option value="BUY STOP">BUY STOP</option>
                      <option value="SELL LIMIT">SELL LIMIT</option>
                      <option value="SELL STOP">SELL STOP</option>
                  </select>
              </div>
              <div class="form-group mb-3">
                  <label for="inputPrice" class="form-label">Price</label>
                  <div class="input-group">

                      <span class="input-group-text">00.000</span>
                      <input type="number" step="0.0000000001" class="form-control @error('price') is-invalid @enderror" name="price" id="inputPrice" aria-label="Input Price" required>
                      @error('price')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
              </div>
              <div class="form-group mb-3">
                  <label for="inputSignal" class="form-label">Select Market</label>
                  <select type="text" class="form-select" name="market" id="cmb_market" aria-label="Select Market">
                      {{-- <option value="1">EPIC5000</option>
                      <option value="2">EPIC3000</option>
                      <option value="3">EPIC1000</option>
                      <option value="4">APPLE</option> --}
                  </select>
              </div>--}}
              {{-- <div class="input-group mb-3">
                  <span class="input-group-text">$</span>
                  <input type="number" step="0.001" class="form-control @error('investment') is-invalid @enderror" name="investment" id="txt_invest" aria-label="Input Investment" required>
                  @error('price')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
              </div>  --}}
              {{-- <div class="mb-3">
                  <label for="inputDuration" class="form-label">Trade Duration</label>
                  <select type="text" class="form-select" name="duration" id="cmb_time_frame" aria-label="Select Market">
                      <option value="1s">1s</option>
                      <option value="3s">3s</option>
                      <option value="5s">5s</option>
                      <option value="10s">10s</option>
                      <option value="30s">30s</option>
                      <option value="60s">60s</option>
                      <option value="5m">5m</option>
                      <option value="10m">10m</option>
                      <option value="15m">15m</option>
                      <option value="20m">20m</option>
                      <option value="25m">25m</option>
                      <option value="30m">30m</option>
                      <option value="35m">35m</option>
                      <option value="40m">40m</option>
                      <option value="45m">45m</option>
                      <option value="50m">50m</option>
                      <option value="55m">55m</option>
                      <option value="60m">60m</option>
                      <option value="1d">1d</option>
                      <option value="EOC1M">EOC1M</option>
                      <option value="EOC5M">EOC5M</option>
                      <option value="EOC15M">EOC15M</option>
                      <option value="EOC30M">EOC30M</option>
                  </select>
              </div> --}}
              {{-- <button type="submit" class="btn btn-primary">Order</button> --}}
            </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_student">Save</button>
                </div>

            </div>
        </div>
</main>

@endsection
