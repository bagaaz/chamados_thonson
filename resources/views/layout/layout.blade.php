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
                    <a href="#" class="header_menu__list-item-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <nav class="sidebar">
        <div class="sidebar_title">
            <h1>Chamados</h1>
        </div>
        <div class="sidebar_menus__submenu">
            <h4 class="sidebar_submenu__titulo">
                Dashboard
                <i class="fa-solid fa-caret-down" data-submenu-drop></i>
                <i class="fa-solid fa-caret-right" style="display: none;" data-submenu-drop></i>
            </h4>
            <ul class="sidebar_submenu__lista">
                <li class="sidebar_submenu__lista-item">Dashboard</li>

            </ul>
        </div>
        <div class="sidebar_menus">
            <div class="sidebar_menus__submenu">
                <h4 class="sidebar_submenu__titulo">
                    Chamados
                    <i class="fa-solid fa-caret-down" data-submenu-drop></i>
                    <i class="fa-solid fa-caret-right" style="display: none;" data-submenu-drop></i>
                </h4>
                <ul class="sidebar_submenu__lista">
                    <li class="sidebar_submenu__lista-item">Registrar chamado</li>
                    <li class="sidebar_submenu__lista-item">Meus chamados</li>
                </ul>
            </div>
            <div class="sidebar_menus__submenu">
                <h4 class="sidebar_submenu__titulo">
                    Suporte
                    <i class="fa-solid fa-caret-down" data-submenu-drop></i>
                    <i class="fa-solid fa-caret-right" style="display: none;" data-submenu-drop></i>
                </h4>
                <ul class="sidebar_submenu__lista">
                    <li class="sidebar_submenu__lista-item">Chamados em aberto</li>
                    <li class="sidebar_submenu__lista-item">Todos os chamados</li>
                    <li class="sidebar_submenu__lista-item">Chamados em espera</li>

                </ul>
            </div>
            <div class="sidebar_menus__submenu">
                <h4 class="sidebar_submenu__titulo">
                    Admin
                    <i class="fa-solid fa-caret-down" data-submenu-drop></i>
                    <i class="fa-solid fa-caret-right" style="display: none;" data-submenu-drop></i>
                </h4>
                <ul class="sidebar_submenu__lista">
                    <li class="sidebar_submenu__lista-item">Cadastrar usuario</li>
                    <li class="sidebar_submenu__lista-item">Remover usuario</li>
                    <li class="sidebar_submenu__lista-item">Todos os usuarios</li>

                </ul>
            </div>
        </div>
    </nav>
    <main class="application">
        @yield('content')
    </main>
    <footer class="footer">
        <div class="footer_copy">Gabriel Oliveira</div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
