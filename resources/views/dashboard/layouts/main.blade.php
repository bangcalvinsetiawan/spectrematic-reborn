<?php
    // error_reporting("E_ALL");
    // ini_set('display_errors', 1);
    // $code = $_GET['code'];
    // $header_values = array("Accept: application/json", "Content-Type: application/x-www-form-urlencoded");
    // $url = 'https://wss.hyper-api.com/token.php';
    // $post_arr = array("code" => $code, "grant_type" => "authorization_code");
    // $process = curl_init($url);
    // curl_setopt($process, CURLOPT_HTTPHEADER, $header_values);
    // curl_setopt($process, CURLOPT_USERPWD, "2999a8b9e1ecc9bd2f8d7d85aa46b0f7:0ca33103c520ed2edd261cf66eed06");
    // curl_setopt($process, CURLOPT_POST, 1);
    // curl_setopt($process, CURLOPT_POSTFIELDS, http_build_query($post_arr));
    // curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
    // $result = curl_exec($process);
    // $json_object = json_decode($result, true);

    // $access_token = $json_object['access_token'];
    // echo $access_token;
    // print_r($access_token);
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Spectrematic | {{ $title }}</title>
        <link href="ttps://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ url('mt/css/styles.css') }}" rel="stylesheet" />
        <link type="text/css" href="{{ url('mt/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            #cacing {
            position: absolute;
            bottom: 60px;
            right: 60px;
            width: 140px;
            }
            #signal {
            position: absolute;
            bottom: 328px;
            right: 60px;
            width: 140px;
            }
            #signal1 {
            position: absolute;
            bottom: 440px;
            right: 60px;
            width: 140px;
            }
            #btnExecutor {
            position: absolute;
            bottom: 10px;
            right: 55px;
            }


                table {
                background-color: transparent
            }

            caption {
                padding-top: 8px;
                padding-bottom: 8px;
                color: #777;
                text-align: left
            }

            th,td {
            text-align: left;
            font-size: 15px;
            }

            .table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 20px
            }

            .table>tbody>tr>td,.table>tbody>tr>th,.table>thead>tr>td,.table>thead>tr>th {
                padding: 5px;
                line-height: 0.3;
                vertical-align: top;
                border-top: 1px solid #ddd
            }

            .table>thead>tr>th {
                vertical-align: bottom;
                border-bottom: 1.5px solid #ddd
            }


            .table-responsive {
                min-height: .01%;
                overflow-x: auto
            }

            @media screen and (max-width:767px) {
                .table-responsive {
                    width: 100%;
                    margin-bottom: 1px;
                    overflow-y: hidden;
                    -ms-overflow-style: -ms-autohiding-scrollbar;
                    border: 1px solid #ddd
                }

                .table-responsive>.table {
                    margin-bottom: 0
                }

                .table-responsive>.table>tbody>tr>td,.table-responsive>.table>tbody>tr>th,.table-responsive>.table>thead>tr>td,.table-responsive>.table>thead>tr>th {
                    white-space: nowrap
                }
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <div id="PotRx" style="display:non">
            <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <!-- Navbar Brand-->
                <a class="navbar-brand ps-3" href="">SPECTREMATIC</a>
                <!-- Sidebar Toggle-->
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                <ul class="navbar-nav ms-auto me-3 me-lg-4">
                    <select class="badge bg-success" aria-label="Default Select Market" for="simpleinput" id="cmb_duration"style="width:50px"></select>
                </ul>
                <ul class="navbar-nav ">
                <select class="badge bg-success"id="cmbAccountType">
                                <option class="dropdown-item" value="1">Demo</option>
                    <option class="dropdown-item" value="4">Reguler</option>

                </select>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Welcome, {{ auth()->user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-end"style="width:250px" aria-labelledby="navbarDropdown">
                            <div class="card border-primary text-white col-md-12">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Trader ID
                                    <span class="badge bg-primary rounded-pill" id="lblAccId">00000</span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                    End Balance
                                    <span class="badge bg-primary rounded-pill" id="lblCurrentBalance">00000</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Balance
                                        <span class="badge bg-primary rounded-pill" id="lblStartBalance">00000</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Profit
                                        <span class="badge bg-light rounded-pill" id="lblPL">00000</span>
                                    </li>
                                </ul>
                            </div>
                            <li><hr class="dropdown-divider" /></li>

                            <li style="display:none;"><a class="dropdown-item" id="out"></a></li>
                            <li>
                                <a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modaltoken">
                                    Get Token
                                </a>
                            </li>

                            <li><a type="button" href="{{ route('logout') }}" style="cursor: pointer" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>

                <span id="mserver"><i class="fas fa-circle" style="width:10px;" ></i></span>
                <span id="fserver"><i class="fas fa-signal" style="margin-right:20px;"></i></span>
            </nav>

            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <!--  <a class="nav-link" id"Dasboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>-->
                            <a class="nav-link acktiv" id="Dasboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dasboard
                        </a>
                        <a class="nav-link" id="setting">
                            <div class="sb-nav-link-icon"><i class="fas fa-cog stopPopSettings"></i></div>
                            Setting
                        </a>
                        <a class="nav-link" id="tabprofit" >
                            <div class="sb-nav-link-icon"><i class="fas fa-print"></i></div>
                            TabelProfit
                        </a>
                        <!-- <a class="nav-link" href="users.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            User
                        </a> -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"></div>

                    </div>
                    </nav>
                </div>

                <div id="layoutSidenav_content">
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
                                                        <option value="pattern">fast signal</option>
                                                        <option value="Rul3">Three signal</option>
                                                        <option value="B_Limit">Bay Limit</option>
                                                        <option value="S_Limit">Sell Limit</option>
                                                        <option value="B_Stop">Bay Stop</option>
                                                        <option value="S_Stop">Sell Stop</option>
                                                    </select>
                                                </div>
                                        </li>
                                        </span>
                                        <span class="" id="signal" style="display:non">
                                            <div class="row mb-2" style="display:none" id="Limit">
                                                <li class=" d-flex justify-content-between align-items-center" style="font-size: 10px; font-weight: bold;color:aqua">
                                                    point
                                                    <div class="col-8">
                                                        <select id="PointLimit" class="badge bg-success" style="font-size: 10px;font-weight: bold;height:22px;">
                                                            <option value="0.0001">1 Point</option>
                                                            <option value="0.001">10 point</option>
                                                            <option value="0.01">100 Point</option>
                                                            <option value="0.1">1000 Point</option>
                                                        </select>
                                                    </div>
                                                </li>
                                                <li class=" d-flex justify-content-between align-items-center" style="font-size: 10px; font-weight: bold;color:aqua">
                                                    <b style="display:none" id="BLimit">Buy Limit</b>
                                                    <b style="display:none" id="BStop">Buy Stop</b>
                                                    <div class="col-8">
                                                        <input type="text" id="PointicLS" class="form-control" style="font-size: 12px;font-weight: bold;height:20px;display:none" value='54.00000'>
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
                    </main>

                    {{-- <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Smbot 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                        </div>
                    </div>
                    </footer> --}}
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modaltoken" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modaltokenLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modaltokenLabel">You have to enter the token first</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                          <label for="gettoken" class="col-form-label">Paste your token</label>
                          <input type="text" name="token" class="form-control" id="gettoken" value="{{ auth()->user()->token }}">
                          <span><a href="">Get Token</a></span>
                        </div>
                        <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                        <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </form>
                </div>
            </div>
            </div>
        </div>
        <div id="Landscapex" style="display:none">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="59" height="300" viewBox="0 0 59 64"><g fill="none">
                                <path fill="#85AC" d="M58.063 57.177v-21.65c0-1.78-1.442-3.217-3.22-3.217H30.025v4.343h21.839c.49 0 .884.397.884.886v17.625c0 .49-.395.886-.884.886H30.025v4.346h24.816c1.78 0 3.222-1.441 3.222-3.219zM3.237 63.944h21.65c1.777 0 3.22-1.442 3.22-3.22V19.425c0-1.778-1.444-3.22-3.22-3.22H3.238c-1.78 0-3.219 1.442-3.219 3.22v41.299c.002 1.778 1.44 3.22 3.219 3.22zm10.772-1.967c-1.122 0-2.028-.906-2.028-2.026 0-1.12.906-2.027 2.028-2.027 1.118 0 2.026.907 2.026 2.027s-.908 2.026-2.026 2.026zM4.363 22.403c0-.49.397-.885.886-.885h17.625c.49 0 .886.396.886.885v31.795c0 .49-.397.885-.886.885H5.25c-.489 0-.886-.395-.886-.885V22.403z" /></g>
                            </svg>
                            {{-- <input type="text" id="txt_t" class="form-control" value=""> --}}
                            <input type="text" id="txt_t" class="form-control" value="{{ auth()->user()->token }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.includes.script')
    </body>

</html>
