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
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ url('mt/css/styles.css') }}" rel="stylesheet" />
        <link type="text/css" href="{{ url('mt/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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
                        <option class="dropdown-item" value="4" selected>Reguler</option>
                        <option class="dropdown-item" style="{{ Request::is('token') ? 'display:none;' : '' }}" value="1">Demo</option>
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
                    {{-- @include('dashboard.includes.nav') --}}
                </div>

                <div id="layoutSidenav_content">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('dashboard.includes.script')
    </body>

</html>
