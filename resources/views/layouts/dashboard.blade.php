<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: false, profileOpen: false }" x-cloak>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<<<<<<< HEAD



    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])



    {{-- /////////////////////////////////////// --}}
    {{-- ///////////////////////////////////// --}}
=======
>>>>>>> 5a265721a20daab403fd0abfebf8148c031925db
</head>
<body class="bg-gradient-to-r from-gray-700 to-black h-screen overflow-hidden flex">

<<<<<<< HEAD

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
                        <a href="{{route('vista.stock.bajo')}}" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
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
=======
    <!-- Sidebar -->
    <div
        class="fixed inset-y-0 left-0 w-80 bg-white shadow-lg transform transition-transform duration-300 z-40"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >
        <div class="p-4 text-xl font-bold border-b text-blue-600">Laravel</div>
        <nav class="p-4 space-y-2 overflow-y-auto h-[calc(92vh-64px)]">

            <!-- Static Link -->
            <a href="{{ route('dashboard') }}" class="block py-2 px-3 rounded hover:bg-blue-100">Dashboard</a>

            <!-- Dropdown Section -->
            <div x-data="{ open: false }">
                <button
                    @click="open = !open"
                    class="w-full flex items-center justify-between py-2 px-3 rounded hover:bg-blue-100 focus:outline-none"
                >
                    <span>Gestion de Usuarios</span>
                    <svg
                        :class="{'rotate-90': open}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
>>>>>>> 5a265721a20daab403fd0abfebf8148c031925db

                <div x-show="open" x-collapse class="ml-4 mt-1 space-y-1">
                    <a href="{{ route('listar.usuarios') }}" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Gestionar Usuarios del Sistema
                    </a>
                    <a href="{{ route('listar.empleados') }}" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Gestionar Empleados
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Visualizar historial de pagos
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Generar reportes financieros
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Generar parametros del sistemas
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Visualizar dashboard de indicadores
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Gestionar auditoria de acciones
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Configurar alertas del sistema
                    </a>
                    <a href="{{ route('listar.bitacora') }}" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Bitacora
                    </a>
                </div>
            </div>

            <!-- Dropdown Section -->
            <div x-data="{ open: false }">
                <button
                    @click="open = !open"
                    class="w-full flex items-center justify-between py-2 px-3 rounded hover:bg-blue-100 focus:outline-none"
                >
                    <span>Gestion de Productos</span>
                    <svg
                        :class="{'rotate-90': open}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

<<<<<<< HEAD
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
=======
                <div x-show="open" x-collapse class="ml-4 mt-1 space-y-1">
                    <a href="{{ route('listar.categorias') }}" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Gestionar Categorias de productos
                    </a>
                    <a href="{{ route('listar.productos') }}" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Gestionar Productos
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Gestionar Stock de productos
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Visualizar historial de inventario
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Visualizar reporte de stock bajo
                    </a>
>>>>>>> 5a265721a20daab403fd0abfebf8148c031925db
                </div>
            </div>

            <!-- Dropdown Section -->
            <div x-data="{ open: false }">
                <button
                    @click="open = !open"
                    class="w-full flex items-center justify-between py-2 px-3 rounded hover:bg-blue-100 focus:outline-none"
                >
                    <span>Gestion de Ventas</span>
                    <svg
                        :class="{'rotate-90': open}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <div x-show="open" x-collapse class="ml-4 mt-1 space-y-1">
                    <a href="{{ route('listar.clientes') }}" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Gestionar Clientes
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Gestionar Ventas
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Generar factura de Venta
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Gestionar devoluciones y cancelaciones
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Generar reporte de ventas
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Generar cotizacion
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Gestionar Pagos
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Gestionar Descuentos y Promociones
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Generar reporte de clientes
                    </a>
                </div>
            </div>

            <!-- Dropdown Section -->
            <div x-data="{ open: false }">
                <button
                    @click="open = !open"
                    class="w-full flex items-center justify-between py-2 px-3 rounded hover:bg-blue-100 focus:outline-none"
                >
                    <span>Gestion de Compras</span>
                    <svg
                        :class="{'rotate-90': open}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <div x-show="open" x-collapse class="ml-4 mt-1 space-y-1">
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Gestionar proveedores
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Gestionar compras
                    </a>
                    <a href="#" class="block py-1 px-2 rounded hover:bg-blue-100 text-sm">
                        Generar reporte de compras
                    </a>
                </div>
            </div>
        </nav>
        
        <!-- Profile and Signout Buttons -->
        <div class="absolute bottom-4 left-1/4 transform -translate-x-1/2 flex space-x-4">
            <!-- Profile Button with Icon -->
            <a href="{{ route('perfil') }}" class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-600 text-white hover:bg-blue-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 14c-4.41 0-8 2.69-8 6v2h16v-2c0-3.31-3.59-6-8-6z"></path>
                </svg>
            </a>
            
            <!-- Sign Out Button with Icon -->
            <form action="{{ route('signOut') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-10 h-10 rounded-full bg-gray-600 flex items-center justify-center mr-3 hover:bg-blue-700">
                    <svg class="w-6 h-6" fill="none" stroke="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H3"></path>
                    </svg>
                </button>
            </form>
        </div>

    </div>

    <!-- Backdrop -->
    <div
        x-show="sidebarOpen"
        x-transition
        @click="sidebarOpen = false"
        class="fixed inset-0 bg-black bg-opacity-30 z-30"
    ></div>

<<<<<<< HEAD
    {{-- ////////////////////////// --}}
    {{-- <x-alert-success /> --}}
=======
    <!-- Content -->
    <div class="flex-1 flex flex-col w-full ml-0 transition-all duration-300">
        <!-- Header -->
        <header class="bg-white p-2 flex items-center justify-between">
            <!-- Sidebar toggle -->
            <button @click="sidebarOpen = !sidebarOpen" class="text-gray-600 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <h1 class="text-xl font-semibold">Laravel</h1>
>>>>>>> 5a265721a20daab403fd0abfebf8148c031925db

            <!-- Profile button -->
            <div class="relative">
                <button @click="profileOpen = !profileOpen" class="flex items-center space-x-2 focus:outline-none">
                    <img src="https://i.pravatar.cc/32" class="w-8 h-8 rounded-full" alt="Profile">
                    <span class="hidden md:block text-gray-700 font-medium">{{ Auth::user()->nombre }}</span>
                </button>
                <div
                    x-show="profileOpen"
                    @click.away="profileOpen = false"
                    x-transition
                    class="absolute right-0 mt-2 w-48 bg-gray-100 rounded-md shadow-lg z-50"
                >
                    <a href="{{ route('perfil') }}" class="block px-4 py-2 hover:bg-gray-200">Perfil</a>
                    <form method="POST" action="{{route('signOut')}}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-200">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Page content -->
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
<<<<<<< HEAD
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


=======
        </main>
    </div>
>>>>>>> 5a265721a20daab403fd0abfebf8148c031925db

</body>
</html>
