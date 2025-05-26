<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: false, profileOpen: false }" x-cloak>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @vite('resources/css/app.css')
    {{-- {{-- script de livewire --}}
    @livewireStyles
</head>

<body class="bg-gradient-to-r from-gray-700 to-black h-screen overflow-hidden flex">

    {{-- <!-- Sidebar -->
    <div
        class="fixed inset-y-0 left-0 w-80 bg-white shadow-lg transform transition-transform duration-300 z-40"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >
        <div class="p-4 text-xl font-bold border-b text-blue-600">Laravel</div>

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

    </div> --}}



    <!-- Content -->
    <div class="flex-1 flex flex-col w-full ml-0 transition-all duration-300">
        <!-- Header -->
        <header class="bg-white p-2 flex items-center justify-between relative ">
            <!-- Sidebar toggle -->
            {{-- <button @click="sidebarOpen = !sidebarOpen" class="text-gray-600 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button> --}}

            <div class="absolute left-1/2 transform -translate-x-1/2">
                <h1 class="text-xl font-semibold">Laravel</h1>
            </div>

            <!-- Profile button -->
            @auth
                <div class="ml-auto mr-8 relative ">
                <button @click="profileOpen = !profileOpen" class="flex items-center space-x-2 focus:outline-none">
                    <img src="https://i.pravatar.cc/32" class="w-8 h-8 rounded-full" alt="Profile">
                    <span class="hidden md:block text-gray-700 font-medium">{{ Auth::user()->nombre }}</span>
                </button>
                <div x-show="profileOpen" @click.away="profileOpen = false" x-transition
                    class="absolute right-0 mt-2 w-48 bg-gray-100 rounded-md shadow-lg z-50">
                    <a href="{{ route('perfil') }}" class="block px-4 py-2 hover:bg-gray-200">Perfil </a>
                    <a href="{{ route('signOut') }}" class="block px-4 py-2 hover:bg-gray-200">Logout</a>
                    {{-- <form method="POST" action="#">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-200">

                        </button>
                    </form> --}}
                </div>
            </div>
            @endauth

            @guest
                 <div class="ml-auto mr-8 relative ">
                <button @click="profileOpen = !profileOpen" class="flex items-center space-x-2 focus:outline-none">
                    <img src="https://img.freepik.com/vector-premium/pagina-formulario-inicio-sesion-usuario-3d_169241-6920.jpg?ga=GA1.1.701017138.1745780684&semt=ais_hybrid&w=740" class="w-8 h-8 rounded-full" alt="Profile">
                    <span class="hidden md:block text-gray-700 font-medium">Acceder</span>
                </button>
                <div x-show="profileOpen" @click.away="profileOpen = false" x-transition
                    class="absolute right-0 mt-2 w-48 bg-gray-100 rounded-md shadow-lg z-50">
                    <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-gray-200">Iniciar Session</a>
                    <a href="{{ route('register') }}" class="block px-4 py-2 hover:bg-gray-200">Registrarse</a>
                    {{-- <form method="POST" action="#">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-200">

                        </button>
                    </form> --}}
                </div>
            </div>
            @endguest
        </header>

        <!-- Page content -->
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>
    </div>

</body>

</html>
