<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Reset Css --}}
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/930e1d1167.js" crossorigin="anonymous"></script>
    {{-- Estilos --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/application.css') }}" rel="stylesheet">
    <link href="{{ asset('css/content.css') }}" rel="stylesheet">

</head>
<body>
    <header class="header">
        <nav class="header_menu">
            <ul class="header_menu__list">
                <li class="header_menu__list-item">
                    <div class="header_menu__list-item-input">
                        <input type="search" id="search" name="q">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </li>
                <li class="header_menu__list-item">
                    <a href="#" class="header_menu__list-item-link  dropdown">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </li>
                <li class="header_menu__list-item">
                    <a href="#" class="header_menu__list-item-link">
                        <i class="fa-solid fa-bell"></i>
                    </a>
                </li>
                <li class="header_menu__list-item">
                    <a href="/logout" class="header_menu__list-item-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <nav class="sidebar">
        <div class="sidebar_header">
            <img class="sidebar_logo" src="img/logo_branca.png" alt="Logo sistema de chamados">
            <i id="hamburguer-menu" class="fa-sharp fa-solid fa-bars" onclick="hiddeSidebar()"></i>
        </div>
        <div class="sidebar_menus" id="sidebar_menus">
            <a href="{{ route('dashboard') }}" class="sidebar_menus__submenu">
                <i class="fa-solid fa-gauge sidebar_submenu__icone"></i>
                <h4 class="sidebar_submenu__titulo">Dashboard</h4>
            </a>
            <a href="{{ route('chamado.index') }}" class="sidebar_menus__submenu">
                <i class="fa-solid fa-ticket sidebar_submenu__icone"></i>
                <h4 class="sidebar_submenu__titulo">Chamados</h4>
            </a>
            <a href="{{ route('chamado.index') }}" class="sidebar_menus__submenu">
                <i class="fa-solid fa-headset sidebar_submenu__icone"></i>
                <h4 class="sidebar_submenu__titulo">Suporte</h4>
            </a>
            <a href="{{ route('usuario.index') }}" class="sidebar_menus__submenu">
                <i class="fa-solid fa-users sidebar_submenu__icone"></i>
                <h4 class="sidebar_submenu__titulo">Usuário</h4>
            </a>
        </div>
    </nav>
    <main class="application">
        <div class="application_box">
            @yield('content')
        </div>
    </main>
    <footer class="footer">
        <div class="footer_copy">Gabriel Oliveira</div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/mychart.js') }}"></script>
    <script>
        let sidebarStatus = sessionStorage.getItem('sidebar');
        let sidebar = document.querySelector('.sidebar');
        let header = document.querySelector('.header');
        let application = document.querySelector('.application');
        let footer = document.querySelector('.footer');
        let sidebarMenus = document.querySelector('#sidebar_menus');

        sidebar.style.transition = '0s';
        header.style.transition = '0s';
        application.style.transition = '0s';
        footer.style.transition = '0s';
        sidebarMenus.style.transition = '0s';

        if (sidebarStatus === 'hidden') {
            sidebar.classList.add('sidebar-hidden');
            header.style.width = "97vw";
            application.style.width = "97vw";
            footer.style.width = "97vw";
        }
    </script>
</body>
</html>
