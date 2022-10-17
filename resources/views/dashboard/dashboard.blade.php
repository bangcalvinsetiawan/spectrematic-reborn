@extends('dashboard.layouts.dash')

@section('content')

    <section class="p-3"id="homeshow" >
        <header>
        <h3>Overview</h3>
        <p>Your Account Information</p>
        </header>
        <div class="information d-flex flex-column gap-5">
            <div class="row px-1 mb-2 gap-5">
                <div class="col-xl-6 col-6 card debit">
                    <div class="row">
                        <div class="col">
                            <img src="dash/assets/images/ic_card.svg" alt="Debit" width="54px" />
                            <div class="mt-2">
                                <span>Trader ID</span>
                            </div>
                            <p class="number mt-2"><span id="lblAccId"></span></p>
                            <div class="mt-4">
                                <p class="fw-semibold m-0">{{ $user->name }}</p>
                                <p class="fw-light m-0">$ <span id="lblCurrentBalance"></span></p>
                            </div>
                        </div>
                        <div class="col position-relative">
                            <div class="position-absolute bottom-0 start-0">
                                <p class="m-0">Start</p>
                                <span id="lblStartBalance"></span>
                                <p class="m-0">$ <span id="lblPL"></span></p>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- <div class="col">
                    <h5>Statistic</h5>
                    <div>
                        <canvas id="chart-revenue" width="100%"></canvas>
                    </div>
                </div> --}}
            </div>
            {{-- <div class="row px-1 d-flex justify-content-between">

                <div class="col-xl-6 col-12 p-0 ps-xl-4 transaction">
                    <h5>Latest Transactions</h5>
                    <div class="d-flex flex-column gap-4">
                        <div class="d-flex flex-row gap-3">
                        <div class="icon-history">
                            <img
                            src="dash/assets/images/ic_spotify.svg"
                            width="32"
                            height="32"
                            />
                        </div>
                        <div class="trans-history flex-fill">
                            <div>
                            <p class="m-0 title">Spotify</p>
                            <p class="m-0 date">12 Jan</p>
                            </div>
                            <p class="m-0 outcome">- $20,000</p>
                        </div>
                        </div>
                        <div class="d-flex flex-row gap-3">
                        <div class="icon-history">
                            <img
                            src="dash/assets/images/ic_receive_act.svg"
                            width="32"
                            height="32"
                            />
                        </div>
                        <div class="trans-history flex-fill">
                            <div>
                            <p class="m-0 title">Top Up BCA</p>
                            <p class="m-0 date">12 Jan</p>
                            </div>
                            <p class="m-0 income">+ $120,000</p>
                        </div>
                        </div>
                        <div class="d-flex flex-row gap-3">
                        <div class="icon-history">
                            <img
                            src="dash/assets/images/ic_send_act.svg"
                            width="32"
                            height="32"
                            />
                        </div>
                        <div class="trans-history flex-fill">
                            <div>
                            <p class="title m-0">Send to @anggapro</p>
                            <p class="date m-0">12 Jan</p>
                            </div>
                            <p class="outcome m-0">- $6,000</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    {{-- ShowOrderPending Modal --}}
    <div class="modal fade" id="listOrder" tabindex="-1" aria-labelledby="listOrderModalLabel" aria-hidden="true">
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
                                {{-- <th>ID</th> --}}
                                <th>Signal</th>
                                <th>Price</th>
                                {{-- <th>Market</th>
                                <th>Investment</th> --}}
                                {{-- <th>Duration</th> --}}
                                <th>Result</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <thead id="">
                            <tr>
                                <th id="BL">-</th>
                                <th id="ticBL">-</th>
                                {{-- <th>Duration</th> --}}
                                <th id="resulbl">Waiting</th>
                            </tr>
                            <tr>
                                <th id="SL">-</th>
                                <th id="ticSL">-</th>
                                {{-- <th>Duration</th> --}}
                                <th>Waiting</th>
                            </tr><tr>
                                <th id="BS">-</th>
                                <th id="ticBS">-</th>
                                {{-- <th>Duration</th> --}}
                                <th>Waiting</th>
                            </tr><tr>
                                <th id="SS">-</th>
                                <th id="ticSS">-</th>
                                {{-- <th>Duration</th> --}}
                                <th>Waiting</th>
                            </tr>

                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#AddOrder">Add Order</button>
                </div>

            </div>
        </div>
    </div>
    {{-- End- ShowOrder Modal --}}

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
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#AddOrderModal">Add Order</button>
                </div>

            </div>
        </div>
    </div>
    {{-- End- ShowOrder Modal --}}

    {{-- Add Modal Pending--}}
    <div class="modal fade" id="AddOrder" tabindex="-1" aria-labelledby="AddOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Add Order Limit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <ul id="save_msgList"></ul>

                    <div class="form-group mb-3">
                        <label for="inputSignal" class="form-label">Order Limit</label>
                        <select class=" form-select" id="pdod">
                            <option value="BUY LIMIT">BUY LIMIT</option>
                            <option value="SELL LIMIT">SELL LIMIT</option>
                            <option value="BUY STOP">BUY STOP</option>
                            <option value="SELL STOP">SELL STOP</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="inputPrice" class="form-label">Price</label>
                        <div class="input-group">
                            <span class="input-group-text" id="xspot">00.000</span>
                            <input type="text" id="PointicBL" class="form-control" style="display:none" value="54.00">
                            <input type="text" id="PointicSL" class="form-control" style="display:none" value="54.01">
                            <input type="text" id="PointicBS" class="form-control" style="display:none" value="54.2">
                            <input type="text" id="PointicSS" class="form-control" style="display:none" value="54.0">
                        </div>
                    </div>
                    {{-- <div class="form-group mb-3">
                        <label for="inputSignal" class="form-label">Select Market</label>
                        <select type="text" class="market form-select" id="cmb_marketlis" aria-label="Select Market">
                        </select>
                    </div> --}}
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="number" step="0.001" class="investment form-control" aria-label="Input Investment" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="inputDuration" class="form-label">Trade Duration</label>
                        <select type="text" class="duration form-select" id="cmb_duration2" aria-label="Select Market">
                            {{-- <option value="10s">10s</option>
                            <option value="60s">60s</option>
                            <option value="5m">5m</option> --}}
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#listOrder">Back</button>
                    <button type="button" class="btn btn-primary" id="save">SAVE</button>
                </div>

            </div>
        </div>
    </div>
    {{-- End - Add Modal --}}

    {{-- Add Modal --}}
    <div class="modal fade" id="AddOrderModal" tabindex="-1" aria-labelledby="AddOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddOrderModalLabel">Add Order Limit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <ul id="save_msgList"></ul>

                    <div class="form-group mb-3">
                        <label for="inputSignal" class="form-label">Order Limit</label>
                        <select class="signal form-select">
                            <option value="BUY LIMIT">BUY LIMIT</option>
                            <option value="BUY STOP">BUY STOP</option>
                            <option value="SELL LIMIT">SELL LIMIT</option>
                            <option value="SELL STOP">SELL STOP</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="inputPrice" class="form-label">Price</label>
                        <div class="input-group">
                            <span class="input-group-text" id="">00.000</span>
                            <input type="number" step="0.0000000001" class="price form-control" aria-label="Input Price" required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="inputSignal" class="form-label">Select Market</label>
                        <select type="text" class="market form-select" id="cmb_marketlis" aria-label="Select Market">
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="number" step="0.001" class="investment form-control" aria-label="Input Investment" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="inputDuration" class="form-label">Trade Duration</label>
                        <select type="text" class="duration form-select" id="" aria-label="Select Market">
                            <option value="10s">10s</option>
                            <option value="60s">60s</option>
                            <option value="5m">5m</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#listOrderModal">Back</button>
                    <button type="button" class="add_order btn btn-primary">Order</button>
                </div>

            </div>
        </div>
    </div>
    {{-- End - Add Modal --}}

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
                    <input type="hidden" id="deleting_id">
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

            <div class="row" id="">

                <div class="col-xl-12" id="trx" style="display:non">
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
                        {{-- <table class="table table-hover">
                            <thead>

                                <tr id="OBL">
                                    {{-- <th>ID</th> --}
                                    <th style="font-size: 8px; font-weight: bold;color:" id="BL"></th>
                                    <th style="font-size: 8px; font-weight: bold;color:" id="ticBL"></th>
                                </tr>
                                <tr id="OSL">
                                    <th style="font-size: 8px; font-weight: bold;color:" id="SL"></th>
                                    <th style="font-size: 8px; font-weight: bold;color:" id="ticSL"></th>
                                </tr>
                                <tr id="OBS">
                                  <th style="font-size: 8px; font-weight: bold;color:" id="BS" ></th>
                                 <th style="font-size: 8px; font-weight: bold;color:" id="ticBS"></th>

                                </tr>
                                <tr id="OSS">
                                    <th style="font-size: 8px; font-weight: bold;color:" id="SS"></th>
                                    <th style="font-size: 8px; font-weight: bold;color:" id="ticSS"></th>
                                    {{-- <th>Action</th> --}
                                </tr>
                            </thead>
                        </table> --}}
                        <iframe src="" style="width: 100%; height: 480px" frameborder="0" id="loaderCC"></iframe>
                        <span id="signal1">
                            <li class=" d-flex justify-content-between align-items-center" style="font-size: 10px; font-weight: bold;color:aqua">
                                Market :
                                <div class="col-8">
                                    <select id="cmb_market" class="badge bg-success" style="font-size: 10px;font-weight: bold;height:22px;"> </select>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center mt-1" style="font-size: 10px; font-weight: bold;color:aqua">
                                    Signal :
                                    <div class="col-8">
                                        <select id="cmb_signal" class="badge bg-success" style="font-size: 10px;font-weight: bold;height:22px;">
                                            <option value="manual">Manual</option>
                                            <option value="timesignaltemplate">Time Signal</option>
                                            <option value="ctpoint"> Reversal</option>
                                            <option value="ctpointF"> Follow Trend</option>
                                            <option value="pattern">Fast signal</option>
                                            <option value="Rul3">Trend signal</option>
                                            <option value="Pending-order">Pending</option>
                                            {{-- <option value="S_Limit">Sell Limit</option>
                                            <option value="B_Stop">Buy Stop</option>
                                            <option value="S_Stop">Sell Stop</option> --}}
                                            {{-- <option value="Pending">Pending Order</option> --}}
                                        </select>
                                    </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center mt-1" style="font-size: 10px; font-weight: bold;color:aqua">
                                Duration :
                                <div class="col-6">
                                    <select id="cmb_duration" class="badge bg-success" style="font-size: 10px;font-weight: bold;height:22px;"></select>
                                </div>
                            </li>
                        </span>
                            <span class="" id="signal" style="display:no">
                                <div class="row mb-2" style="display:none" id="Limit">


                                    {{-- <li class=" d-flex justify-content-end align-items-center" style="font-size: 10px; font-weight: bold;color:aqua">
                                        <div class="col-8">
                                                <button id="" class="list_order badge bg-success" data-bs-toggle="modal" data-bs-target="#listOrderModal" style="font-size: 10px;font-weight: bold;height:22px; ">LIST ORDER </button>
                                            </div>
                                    </li> --}}
                                     <li class=" d-flex justify-content-end align-items-center" style="font-size: 10px; font-weight: bold;color:aqua">
                                        <div class="col-8">
                                                <button id="" class="list_order badge bg-success" data-bs-toggle="modal" data-bs-target="#listOrder" style="font-size: 10px;font-weight: bold;height:22px; ">LIST ORDER </button>
                                            </div>
                                    </li>
                                    <li class=" d-flex justify-content-between align-items-center" style="font-size: 10px; font-weight: bold;color:aqua">
                                        <b style="display:none" id="SLimit">
                                            {{-- <select id="" class="badge bg-success" style="font-size: 10px;font-weight: bold;height:22px;">
                                                <option value="BUY LIMIT">BUY LIMIT</option>
                                                <option value="SELL LIMIT">SELL LIMIT</option>
                                                <option value="BUY STOP">BUY STOP</option>
                                                <option value="SELL STOP">SELL STOP</option>
                                            </select> --}}
                                        </b>
                                        <b style="display:none" id="SStop">Sell Stop</b>
                                        {{-- <div class="col-8">
                                            <input type="text" id="PointicBL" class="form-control" style="font-size: 12px;font-weight: bold;height:20px;display:none" value="54.00">
                                            <input type="text" id="PointicSL" class="form-control" style="font-size: 12px;font-weight: bold;height:20px;display:none" value="54.01">
                                            <input type="text" id="PointicBS" class="form-control" style="font-size: 12px;font-weight: bold;height:20px;display:none" value="54.2">
                                            <input type="text" id="PointicSS" class="form-control" style="font-size: 12px;font-weight: bold;height:20px;display:none" value="54.0">
                                        </div> --}}
                                    </li>
                                    <li class=" d-flex justify-content-end align-items-center" style="font-size: 10px; font-weight: bold;color:aqua">
                                        {{-- <div class="col-8">
                                                <button id="" class="list_order badge bg-success" data-bs-toggle="modal" data-bs-target="" style="font-size: 10px;font-weight: bold;height:22px;">seve </button>

                                            </div> --}}

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
                                            <label class="form-label" for="simpleinput">Stop Loss</label>
                                            <input type="text" id="txt_stoploss" class="form-control" value='0'>
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
                                    <div class="col-4 mt-2">
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">Multiplier</label>
                                            <input type="text" id="txt_muliplier" class="form-control" value='0'>
                                        </div>
                                    </div>
                                    <div class="col-4 mt-2">
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">Max. Step</label>
                                            <input type="text" id="txt_max_step" class="form-control" value='0'>
                                        </div>
                                    </div>
                                    <div class="col-4 mt-2">
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
                                    <div class="col-6 mt-2">
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">After Max Step</label>
                                            <select id="cmb_after_step" class="form-control">
                                                <option value="follow">Continue And Reset Investment</option>
                                                <option value="stop">Stop Trade</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-2"style="display:non" id="VirtualSistem">
                                        <label class="form-label" for="simpleinput">Demo Entry System (DES)</label>
                                        <select id="lossvirtual" class="form-control">
                                            <option value="">OFF</option>
                                            <option value="1">DES 1x</option>
                                            <option value="2">DES 2x</option>
                                            <option value="3">DES 3x</option>
                                            <option value="4">DES 4x</option>
                                            <option value="5">DES 5x</option>
                                            <option value="6">DES 6x</option>
                                            <option value="7">DES 7x</option>
                                            <option value="8">DES 8x</option>
                                            <option value="9">DES 9x</option>
                                            <option value="10">DES 10x</option>
                                            <option value="11">DES 11x</option>
                                            <option value="12">DES 12x</option>
                                            <option value="13">DES 13x</option>
                                            <option value="14">DES 14x</option>
                                            <option value="15">DES 15x</option>
                                        </select>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">Demo Entry System For ?</label>
                                            <select id="cmb_Ves" class="form-control">
                                                <option value="Vesloss">DES for LOSS</option>
                                                <option value="Veswin">DES for PROFIT</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <div class="form-group">
                                            <label class="form-label" for="simpleinput">If After DES you get Loss ?</label>
                                            <select id="cmb_VesLoss" class="form-control">
                                                <option value="lossC">Continue Reinvestment</option>
                                                <option value="lossV">Back To DES</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 align-middle mt-2"><br>
                                    <div  class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch2" checked="">
                                        <label class="custom-control-label" for="customSwitch2">Play Notification Sound</label>

                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="card border-primary mt-2 mb-4" id="tabprofitshow" style="display:none">
                <div class="card-header">Profit Table</div>
                    <div class="card-body">
                        <table id="datatableprofit" class="table table-hover">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Trx Id</td>
                                    <td>Assets</td>
                                    <td>Volume</td>
                                    <td>Duration</td>
                                    <td>Contract</td>
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

    </main>

@endsection

