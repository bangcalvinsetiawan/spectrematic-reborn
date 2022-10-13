<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link" id="Dasboard">
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
        <a class="nav-link {{ Request::is('token') ? 'active' : '' }}" href="/token/{{ $user->id }}/edit">
            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
            Token
        </a>
        <a class="nav-link {{ Request::is('order') ? 'active' : '' }}" href="/order" target="_blank">
            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
            Order
        </a>
        </div>
    </div>
    {{-- <div class="sb-sidenav-footer">
        <div class="small"></div>

    </div> --}}
</nav>
