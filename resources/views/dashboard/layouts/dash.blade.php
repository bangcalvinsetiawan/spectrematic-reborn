<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="Spectrematic Dashboard Page" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="keywords"
      content="Spectre, Trading, Option"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Rachma | @rachmadzii" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Spectrematic - {{ $title }}</title>

    <!-- Scrollbar Custom CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css"
    />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Datatables -->
    <link href="ttps://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

    <!-- Sweet Alert -->
    <link type="text/css" href="{{ url('mt/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />

    <!-- External CSS -->
    <link
      rel="stylesheet"
      href="{{ url('dash/assets/css/styles.css') }}"
      type="text/css"
      media="screen"
    />

    <!-- CDN Fontawesome -->
    <script
      src="https://kit.fontawesome.com/32f82e1dca.js"
      crossorigin="anonymous"
    ></script>

    <style>
        #cacing {
        position: absolute;
        bottom: 60px;
        right: 60px;
        width: 140px;
        }
        #signal {
        position: absolute;
        bottom: 290px;
        right: 60px;
        width: 140px;
        }
        #signal1 {
        position: absolute;
        bottom: 400px;
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
  <body>
    <!-- Nav Sidebar -->
    <nav
      class="sidebar offcanvas-md offcanvas-start"
      data-bs-scroll="true"
      data-bs-backdrop="false"
        >
      <div class="d-flex justify-content-end m-3 d-block d-md-none">
        <button
          aria-label="Close"
          data-bs-dismiss="offcanvas"
          data-bs-target=".sidebar"
          class="btn p-0 border-0 fs-4"
        >
          <i class="fas fa-close"></i>
        </button>
      </div>
      <div class="d-flex justify-content-center mt-md-5 mb-5">
        <img
          src="{{ url('dash/assets/images/test.png') }}"
          alt="Logo"
          width="40px"
          height="40px"
        />
      </div>
      <div class="pt-2 d-flex flex-column gap-5">
        <div class="menu p-0">
          <p>Daily Use</p>
          <a id="Dasboard" class="item-menu">
            <i class="icon ic-stats"></i>
            Dashboard
          </a>
          <a id="setting" class="item-menu">
            <i class="icon ic-settings"></i>
            Settings
          </a>
          <a id="tabprofit" class="item-menu">
            <i class="icon ic-trans"></i>
            Transactions
          </a>
          <a href="/token/{{ $user->id }}/edit" class="item-menu {{ Request::is('token*') ? 'active' : '' }}">
            <i class="icon ic-account"></i>
            Token
          </a>
          <a id="out" style="display:none" class="item-menu">
            <i class="icon ic-msg"></i>
            Messages
          </a>
        </div>
        <div class="menu">
          <p>Others</p>
          <a href="#" class="item-menu" style="display:none">
            <i class="icon ic-help"></i>
            Help
          </a>
          <a type="button" href="{{ route('logout') }}" style="cursor: pointer" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="item-menu"><i class="icon ic-logout"></i>
            Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>


        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="content">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div>
                  <button
                    class="sidebarCollapseDefault btn p-0 border-0 d-none d-md-block"
                    aria-label="Hamburger Button"
                    >
                    <i class="fa-solid fa-bars"></i>
                  </button>
                  <button
                    data-bs-toggle="offcanvas"
                    data-bs-target=".sidebar"
                    aria-controls="sidebar"
                    aria-label="Hamburger Button"
                    class="sidebarCollapseMobile btn p-0 border-0 d-block d-md-none"
                  >
                    <i class="fa-solid fa-bars"></i>
                  </button>
                </div>
                <div class="d-flex align-items-center justify-content-end gap-4 navbar fixed-top">
                  <ul class="navbar-nav ">
                      <select class="badge bg-success" id="cmbAccountType">
                          <option class="dropdown-item" value="4" selected>Reguler</option>
                          <option class="dropdown-item" style="{{ Request::is('token') ? 'display:none;' : '' }}" value="1">Demo</option>
                      </select>
                  </ul>
                  <a>Welcome, {{ auth()->user()->name }}</a>
                  {{-- <span id="mserver"><i class="bi bi-reception-4" style="width:10px;"></i></span>
                  <span id="fserver"><i class="fas fa-signal" style="margin-right:20px;"></i></span> --}}
                  <span id="mserver"><i class="bi bi-reception-4" style="width:10px;"></i></span>
                  <span id="fserver"><i class="bi bi-file-check-fill" style="margin-right:30px;"></i></span>
                </div>
            </div>
        </nav>
        @yield('content')
        <div id="Landscapex" style="display:none">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mt-4">
                            <input type="text" id="txt_t" class="form-control" value="{{ auth()->user()->token }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('dashboard.includes.script')

    <!-- Bootstrap JS -->
    {{-- <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script> --}}

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script> --}}
    {{-- <script src="{{ url('dash/assets/js/donut_chart.js') }}"></script> --}}
    <script src="{{ url('dash/assets/js/line_chart.js') }}"></script>

    <script>
      $(document).ready(function () {
        $('.sidebarCollapseDefault').on('click', function () {
          $('.sidebar').toggleClass('active');
          $('.content').toggleClass('active');
        });
      });
    </script>
  </body>
</html>
