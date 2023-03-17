<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main" style="z-index: 1001;">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 text-center" href="{{ route('home') }}">
            <img src="{{ asset('/img/logos/logo.png') }}" id="sidebar_logo" class="navbar-brand-img h-100" alt="main_logo">
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main" style="height: auto;">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-wrap {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"
                    href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-tv text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-wrap {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}"
                    href="{{ route('profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-user text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Perfil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-wrap {{ str_contains(request()->url(), 'calls') == true ? 'active' : '' }}"
                    href="{{ route('calls') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-headset text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Chamados</span>
                </a>
            </li>
            @if (Auth::user()->role_id == 3)

            <li class="nav-item mt-3 d-flex align-items-center">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Admin</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-wrap {{ str_contains(request()->url(), 'users') == true ? 'active' : '' }}"
                href="{{ route('users') }}">
                    <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-users text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Gerenciamento de Usuarios</span>
                </a>
            </li>
            <li class="nav-item mt-3 d-flex align-items-center">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Configuração do Sistema</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-wrap {{ str_contains(request()->url(), 'priorities') == true ? 'active' : '' }}"
                href="{{ route('priorities') }}">
                <div
                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-angles-up text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Prioridades de Chamados</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-wrap {{ str_contains(request()->url(), 'status') == true ? 'active' : '' }}"
                href="{{ route('status') }}">
                    <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-temperature-half text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Status de Chamados</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</aside>
