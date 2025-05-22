{{-- layout/dashboard.blade.php --}}
{{-- <!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: ($store.sidebar.open) }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard')</title>
    {{-- importamos nuestros estilos de tailwind
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Estilo de emergencia */
        #sidebar-toggle {
            position: fixed !important;
            z-index: 9999 !important;
            top: 1rem !important;
            left: 1rem !important;
            background: #EF4444 !important; /* Rojo para máxima visibilidad */
            color: white !important;
            padding: 1rem !important;
            border-radius: 50% !important;
            width: 3rem !important;
            height: 3rem !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            box-shadow: 0 0 0 4px white, 0 0 10px rgba(0,0,0,0.5) !important;
        }
    </style>
    {{-- importamos nuestros iconos de font-awesome
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@php
    $socialMedia = [
        'twitch' => '@neiderruiz_',
        'youtube' => '@neiderruiz',
        'facebook' => '@neiderruizzz',
        'instagram' => '@neiderruiz_',
        'tiktok' => '@neiderruiz_',
        'twitter' => '@neiderruiz_',
    ];
@endphp

<body>
    <button id="sidebar-toggle" @click="$store.sidebar.toggle()"
        {{-- class="fixed z-50 top-3 left-3 p-2 bg-gray-800 rounded-lg shadow-md hover:bg-gray-900 transition"
        style="filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));"
        x-show="!$store.sidebar.open || (window.innerWidth < 640 && $store.sidebar.open)" >
        <i class="fas fa-bars" x-show="!$store.sidebar.open"></i>
        <i class="fas fa-times" x-show="$store.sidebar.open"></i>
    </button>

    <aside id="sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-all duration-300 ease-in-out bg-gray-50"
        :class="{ '-translate-x-full': !$store.sidebar.open, 'translate-x-0': $store.sidebar.open }"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 ">
            <a href="https://devsbrand.dev/" class="flex items-center ps-2.5 mb-5">
                <img src="https://devsbrand.dev/_image?href=%2F_astro%2Flogo.94z_dL7D.png&w=60&f=webp"
                    class="h-6 me-3 sm:h-7" alt="devsbrand Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap ">Devsbrand</span>
            </a>
            <div class="h-4/5 flex flex-col  justify-between">
                <ul class="space-y-2 font-medium ">
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100  group">
                            <i class="fa-solid fa-chart-simple"></i>
                            <span class="ms-3">
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100  group">
                            <i class="fa-solid fa-list"></i>
                            <span class="ms-3">
                                Articles
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100  group">
                            <i class="fa-solid fa-list"></i>
                            <span class="ms-3">
                                Deletes Article
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100  group">
                            <i class="fa-solid fa-list"></i>
                            <span class="ms-3">
                                {{ auth()->user()->name }} ({{ auth()->user()->role }})
                            </span>
                        </a>
                    </li>
                </ul>
                <ul class="">
                    @foreach ($socialMedia as $platform => $username)
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                <i class="fa-brands fa-{{ $platform }}"></i>
                                <span class="flex-1 ms-3 whitespace-nowrap">{{ $username }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </aside>

    <div class="p-4 transition-all duration-300 ease-in-out"
        :class="{ 'ml-0': !$store.sidebar.open, 'sm:ml-64': $store.sidebar.open }">
        <div class="p-4 rounded-lg ">
            @yield('content')
        </div>

    </div>


    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('sidebar', {
              //  open: window.innerWidth >= 640, // Abierto en desktop por defecto
              open: true, // Abierto por defecto en desktop
                toggle() {
                    this.open = !this.open;
                }
            });
        });
    </script>

</body>

</html> --}}
<!DOCTYPE html>
<html lang="en" x-data>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])



    {{-- /////////////////////////////////////// --}}
    {{-- ///////////////////////////////////// --}}
</head>


{{-- <body class="bg-cover bg-center bg-no-repeat"> --}}

<body class="bg-cover bg-center bg-no-repeat" style="background-image: url('/assets/seguridad-domotica.jpg');">


{{-- <body class="bg-gray-50 "> --}}
    <!-- Botón flotante (siempre visible) -->
    {{-- <button @click="$store.sidebar.toggle()"
        class="fixed z-50 top-4 left-4 px-2 bg-gray-20 text-gray-900 rounded-lg  hover:bg-gray-200 transition-all">
        <i class="fas fa-bars text-lg" x-show="!$store.sidebar.open"></i>
        {{-- <i class="fa fa-minus-square-o" x-show="$store.sidebar.open"></i>
        <i class="fas fa-bars text-lg" x-show="$store.sidebar.open"></i>
        {{-- <i class="fas fa-times text-lg" x-show="$store.sidebar.open"></i>
        {{-- style="filter: drop-shadow(0 2px 4px rgba(21, 197, 50, 0.836));"
    </button> --}}
    {{-- aqui va el boton del side bar --}}
    <!-- Sidebar estilo ChatGPT -->



    {{-- <aside class="fixed top-0 left-0 z-40 w-70 h-screen bg-white shadow-xl transition-all duration-300 ease-in-out" --}}

    <aside class="fixed top-0 left-0 z-40 w-64 h-screen bg-white shadow-xl transition-all duration-300 ease-in-out"

        :class="{ '-translate-x-full': !$store.sidebar.open, 'translate-x-0': $store.sidebar.open }">
        <button @click="$store.sidebar.toggle()"
            class="fixed z-50 top-4 left-4 px-2 bg-gray-20 text-gray-900 rounded-lg  hover:bg-gray-200 transition-all">
            {{-- <i class="fas fa-bars text-lg" x-show="!$store.sidebar.open"></i> --}}
            {{-- <i class="fa fa-minus-square-o" x-show="$store.sidebar.open"></i> --}}
            <i class="fas fa-bars text-lg" x-show="$store.sidebar.open"></i>
            {{-- <i class="fas fa-times text-lg" x-show="$store.sidebar.open"></i> --}}
            {{-- style="filter: drop-shadow(0 2px 4px rgba(21, 197, 50, 0.836));" --}}
        </button>
        <div class="h-full flex flex-col p-4 border-r border-gray-200">
            <!-- Logo y título -->
            <div class="flex items-center  justify-end mb-8">
                <img src="/assets/Escudo_FICCT_color.jpg" alt="Universidad"
                    class="h-8  mr-3">
                <span class="text-xl font-semibold">Grupo 1</span>
            </div>
            <!-- Menú -->
            <nav class="flex-1 space-y-2">

                <a href="{{ route('dashboard') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-chart-simple mr-3 text-gray-600"></i>
                    <span>Dashboard</span>
                </a>
                <!-- Gestion de usuarios -->
                <details class="group">
                    <summary class="flex items-center p-3 rounded-lg hover:bg-gray-100 cursor-pointer">
                        <i class="fas fa-list mr-3 text-gray-600"></i>
                        <span>Gestion de usuarios</span>
                        <i class="fas fa-chevron-down ml-auto transition-transform group-open:rotate-180"></i>
                    </summary>
                    <div class="ml-6 mt-2 space-y-2">
                        <a href="{{ route('listar.usuarios') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-user mr-3 text-gray-600"></i>
                            <span>Gestionar Usuarios del Sistema</span>
                        </a>
                    </div>
                    <div class="ml-6 mt-2 space-y-2">
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-dollar mr-3 text-gray-600"></i>
                            <span>Visualizar historial de pagos</span>
                        </a>
                    </div>
                    <div class="ml-6 mt-2 space-y-2">
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-tags mr-3 text-gray-600"></i>
                            <span>Generar reportes financieros</span>
                        </a>
                    </div>
                    <div class="ml-6 mt-2 space-y-2">
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-tags mr-3 text-gray-600"></i>
                            <span>Generar parametros del sistemas</span>
                        </a>
                    </div>
                    <div class="ml-6 mt-2 space-y-2">
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-chart-pie mr-3 text-gray-600"></i>
                            <span>Visualizar dashboard de indicadores</span>
                        </a>
                    </div>
                    <div class="ml-6 mt-2 space-y-2">
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-tags mr-3 text-gray-600"></i>
                            <span>Gestionar auditoria de acciones</span>
                        </a>
                    </div>
                    <div class="ml-6 mt-2 space-y-2">
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-tags mr-3 text-gray-600"></i>
                            <span>Configurar alertas del sistema</span>
                        </a>
                    </div>
                    <div class="ml-6 mt-2 space-y-2">
                        <a href="{{route ('listar.bitacora') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-history mr-3 text-gray-600"></i>
                            <span>Bitacora</span>
                        </a>
                    </div>
                </details>
                <!-- Gestion de productos -->
                <details class="group">
                    <summary class="flex items-center p-3 rounded-lg hover:bg-gray-100 cursor-pointer">
                        <i class="fas fa-list mr-3 text-gray-600"></i>
                        <span>Gestion de productos</span>
                        <i class="fas fa-chevron-down ml-auto transition-transform group-open:rotate-180"></i>
                    </summary>
                    <div class="ml-6 mt-2 space-y-2">
                        <a href="{{ route('listar.categorias') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-tags mr-3 text-gray-600"></i>
                            <span>Gestionar Categorías de productos</span>
                        </a>
                        <a href="{{ route('listar.productos') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-box mr-3 text-gray-600"></i>
                            <span>Gestionar Productos</span>
                        </a>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-chart-pie mr-3 text-gray-600"></i>
                            <span>Gestionar Stock de productos</span>
                        </a>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-box mr-3 text-gray-600"></i>
                            <span>Visualizar historial de inventario</span>
                        </a>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-box mr-3 text-gray-600"></i>
                            <span>Visualizar reporte de stock bajo</span>
                        </a>
                    </div>
                </details>
                <!-- Gestion de ventas -->
                <details class="group">
                    <summary class="flex items-center p-3 rounded-lg hover:bg-gray-100 cursor-pointer">
                        <i class="fas fa-list mr-3 text-gray-600"></i>
                        <span>Gestion de ventas</span>
                        <i class="fas fa-chevron-down ml-auto transition-transform group-open:rotate-180"></i>
                    </summary>
                    <div class="ml-6 mt-2 space-y-2">
                        <a href="{{ route('listar.clientes') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-user mr-3 text-gray-600"></i>
                            <span>Gestionar Clientes</span>
                        </a>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-shopping-bag mr-3 text-gray-600"></i>
                            <span>Gestionar Ventas</span>
                        </a>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-shopping-bag mr-3 text-gray-600"></i>
                            <span>Generar factura de Venta</span>
                        </a>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-shopping-bag mr-3 text-gray-600"></i>
                            <span>Gestionar devoluciones y cancelaciones</span>
                        </a>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-file mr-3 text-gray-600"></i>
                            <span>Generar reporte de ventas</span>
                        </a>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-shopping-bag mr-3 text-gray-600"></i>
                            <span>Generar cotizacion</span>
                        </a>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-dollar mr-3 text-gray-600"></i>
                            <span>Gestionar Pagos</span>
                        </a>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-dollar mr-3 text-gray-600"></i>
                            <span>Gestionar Descuentos y Promociones</span>
                        </a>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-file mr-3 text-gray-600"></i>
                            <span>Generar reporte de clientes</span>
                        </a>
                    </div>
                </details>
                <!-- Gestion de compras -->
                <details class="group">
                    <summary class="flex items-center p-3 rounded-lg hover:bg-gray-100 cursor-pointer">
                        <i class="fas fa-list mr-3 text-gray-600"></i>
                        <span>Gestion de compras</span>
                        <i class="fas fa-chevron-down ml-auto transition-transform group-open:rotate-180"></i>
                    </summary>
                    <div class="ml-6 mt-2 space-y-2">
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-user mr-3 text-gray-600"></i>
                            <span>Gestionar proveedores</span>
                        </a>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-shopping-cart mr-3 text-gray-600"></i>
                            <span>Gestionar compras</span>
                        </a>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-shopping-cart mr-3 text-gray-600"></i>
                            <span>Generar reporte de compras</span>
                        </a>
                    </div>
                </details>

                <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-trash mr-3 text-gray-600"></i>
                    <span>Deleted Articles</span>
                </a>

                {{-- <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-chart-simple mr-3 text-gray-600"></i>
                    <span>Dashboard</span>
                </a> --}}
                {{-- <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-list mr-3 text-gray-600"></i>
                    <span>Articles</span>
                </a> --}}
                {{-- <a href="{{ route('listar.usuarios') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-list mr-3 text-gray-600"></i>
                    <span>Listar Usuarios</span>
                </a>
                <a href="{{ route( 'listar.categorias')}}" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-list mr-3 text-gray-600"></i>
                    <span>listar categorias</span>
                </a>

                <a href="{{ route( 'listar.productos')}}" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-list mr-3 text-gray-600"></i>
                    <span>listar productos</span>
                </a> --}}

                {{-- <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-trash mr-3 text-gray-600"></i>
                    <span>Deleted Articles</span>
                </a> --}}

            </nav>

            <!-- Usuario y redes -->
            <div class="mt-auto pt-4 border-t border-gray-200">
                <div class="flex items-center p-3">
                    <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center mr-3">
                        <a href="{{ route('perfil') }}">
                            <i class="fas fa-user text-sm"></i>
                        </a>

                    </div>

                    <form action="{{ route('signOut') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center mr-3">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                        </button>
                    </form>

                    {{-- <div>
                        <div class="font-medium">{{ auth()->user()->name }}</div>
                        <div class="text-xs text-gray-500">{{ auth()->user()->role }}</div>
                    </div> --}}
                </div>
            </div>
        </div>
    </aside>

    {{-- ////////////////////////////// --}}

    {{-- <main class="min-h-screen transition-all duration-300 ease-in-out pt-16 px-4"
    :class="{ 'ml-0': !$store.sidebar.open, 'ml-64': $store.sidebar.open }"> --}}

    {{-- <nav x-data="{ open: false, userMenu: false }" class="bg-white border-b border-gray-200 fixed top-0 left-0 w-full z-50"> --}}
    {{-- <nav x-data="{ open: false, userMenu: false }" :class="{ 'ml-0': !$store.sidebar.open, 'ml-64': $store.sidebar.open }"
        class="bg-white border-b border-gray-200  top-0 w-full z-50 transition-all duration-300 ease-in-out"> --}}
    <nav x-data="{ open: false, userMenu: false }" :class="{ 'ml-0': !$store.sidebar.open, 'ml-64': $store.sidebar.open }"
        class="bg-white border-b border-gray-200  top-0 z-50 transition-all duration-300 ease-in-out">
        <button @click="$store.sidebar.toggle()"
            class="fixed z-50 top-4 left-4 px-2 bg-gray-20 text-gray-900 rounded-lg  hover:bg-gray-200 transition-all">
            <i class="fas fa-bars text-lg" x-show="!$store.sidebar.open"></i>
        </button>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex justify-between h-16 items-center">
                <!-- Logo + links desktop -->
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-xl font-bold text-gray-800">MiApp</a>
                    <a href="{{ route('dashboard') }}" class="hidden md:block text-gray-700 hover:text-blue-500">Inicio</a>
                    <a href="#" class="hidden md:block text-gray-700 hover:text-blue-500">Productos</a>
                    <a href="#" class="hidden md:block text-gray-700 hover:text-blue-500">Usuarios</a>
                </div>

                <!-- Perfil y menú -->
                <div class="flex items-center space-x-4">
                    <!-- Usuario -->
                    <div class="relative">
                        <button @click="userMenu = !userMenu" class="flex items-center space-x-2 focus:outline-none">
                            <img src="https://i.pravatar.cc/40" alt="Avatar" class="w-8 h-8 rounded-full">
                            <span class="hidden md:block text-gray-700 font-medium">Juan</span>
                            <svg class="w-4 h-4 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.298l3.71-4.068a.75.75 0 011.08 1.04l-4.25 4.667a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Dropdown -->
                        <div x-show="userMenu" @click.outside="userMenu = false" x-transition {{-- class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-md py-2 z-50"> --}}
                            class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-md py-2 z-50">
                            <a href="/perfil" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Perfil</a>
                            <form method="POST" action="{{route('signOut')}}">
                                @csrf
                            {{-- <form method="POST" action="/logout"> --}}
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Cerrar sesión
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Botón móvil -->
                    <button @click="open = !open" class="md:hidden text-gray-700 focus:outline-none">
                        <template x-if="!open">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </template>
                        <template x-if="open">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </template>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menú móvil -->
        <div x-show="open" x-transition class="md:hidden px-4 pb-4">
            <a href="#" class="block py-2 text-gray-700 hover:text-blue-500">Inicio</a>
            <a href="#" class="block py-2 text-gray-700 hover:text-blue-500">Productos</a>
            <a href="#" class="block py-2 text-gray-700 hover:text-blue-500">Usuarios</a>
            <a href="/perfil" class="block py-2 text-gray-700 hover:text-blue-500">Perfil</a>
            <form method="POST" action="/logout">
                <button type="submit" class="w-full text-left py-2 text-gray-700 hover:text-blue-500">Cerrar
                    sesión</button>
            </form>
        </div>
    </nav>



    {{-- ////////////////////////// --}}
    {{-- <x-alert-success /> --}}

    <!-- Contenido principal -->
    {{-- <main class="min-h-screen transition-all duration-300 ease-in-out" --}}
    <main class="min-h-screen transition-all duration-300 ease-in-out pt-16 px-4"
        :class="{ 'ml-0': !$store.sidebar.open, 'ml-64': $store.sidebar.open }">
        <div class="p-6">
            @yield('content')
        </div>
    </main>


    <!-- Alpine.js Store -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('sidebar', {
                open: window.innerWidth >= 768, // Abre automáticamente en desktop
                toggle() {
                    this.open = !this.open;
                }
            });
        });
    </script>



</body>

</html>
