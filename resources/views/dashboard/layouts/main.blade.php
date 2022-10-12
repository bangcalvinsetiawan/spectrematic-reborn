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
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <select class="badge bg-success" aria-label="Default Select Market" for="simpleinput" id="cmb_duration" style="width:50px"></select>
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
                    @include('dashboard.includes.nav')
                </div>

                <div id="layoutSidenav_content">
                    @yield('content')

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
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <ul id="update_msgList"></ul>
                    <input type="hidden" id="user_id" />
                    <div class="mb-3">
                      <label for="gettoken" class="col-form-label">Paste your token</label>
                      <input type="text" class="token form-control" id="token" value="{{ auth()->user()->token }}">
                      <span><a href="https://wss.hyper-api.com/authorize.php?app_id=2999a8b9e1ecc9bd2f8d7d85aa46b0f7&grant=oauth&response_type=code&client_id=2999a8b9e1ecc9bd2f8d7d85aa46b0f7&state=spectrematic" target="_blank">Get your token</a></span>
                    </div>
                    <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                    <button type="submit" class="btn btn-primary update_token">Let's Trade</button>
                    </div>
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
        <script>
            // $(document).ready(function () {
            //     $(document).on('click', '.editbtn', function (e) {
            //         e.preventDefault();
            //         var user_id = $(this).val();
            //         alert(user_id);
            //         $('#editModal').modal('show');
            //         $.ajax({
            //             type: "GET",
            //             url: "/edit-student/" + stud_id,
            //             success: function (response) {
            //                 if (response.status == 404) {
            //                     $('#success_message').addClass('alert alert-success');
            //                     $('#success_message').text(response.message);
            //                     $('#editModal').modal('hide');
            //                 } else {
            //                     // console.log(response.student.name);
            //                     $('#name').val(response.student.name);
            //                     $('#course').val(response.student.course);
            //                     $('#email').val(response.student.email);
            //                     $('#phone').val(response.student.phone);
            //                     $('#stud_id').val(stud_id);
            //                 }
            //             }
            //         });
            //         $('.btn-close').find('input').val('');

            //     });

            //     $(document).on('click', '.update_student', function (e) {
            //         e.preventDefault();

            //         $(this).text('Updating..');
            //         var id = $('#stud_id').val();
            //         // alert(id);

            //         var data = {
            //             'name': $('#name').val(),
            //             'course': $('#course').val(),
            //             'email': $('#email').val(),
            //             'phone': $('#phone').val(),
            //         }

            //         $.ajaxSetup({
            //             headers: {
            //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //             }
            //         });

            //         $.ajax({
            //             type: "PUT",
            //             url: "/update-student/" + id,
            //             data: data,
            //             dataType: "json",
            //             success: function (response) {
            //                 // console.log(response);
            //                 if (response.status == 400) {
            //                     $('#update_msgList').html("");
            //                     $('#update_msgList').addClass('alert alert-danger');
            //                     $.each(response.errors, function (key, err_value) {
            //                         $('#update_msgList').append('<li>' + err_value +
            //                             '</li>');
            //                     });
            //                     $('.update_student').text('Update');
            //                 } else {
            //                     $('#update_msgList').html("");

            //                     $('#success_message').addClass('alert alert-success');
            //                     $('#success_message').text(response.message);
            //                     $('#editModal').find('input').val('');
            //                     $('.update_student').text('Update');
            //                     $('#editModal').modal('hide');
            //                     fetchstudent();
            //                 }
            //             }
            //         });

            //     });
            // });
        </script>
        @yield('scripts')
    </body>

</html>
