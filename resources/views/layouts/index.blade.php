<!DOCTYPE html>
<html lang="en">
{{-- <html lang="en" x-data="{ sidebarOpen: false, profileOpen: false }" x-cloak> --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>



    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



    {{-- {{-- script de livewire --}}
    @livewireStyles

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-r from-gray-700 to-black h-screen overflow-hidden flex" x-data="{ sidebarOpen: false, profileOpen: false }" x-cloak>

    <!-- Content -->
    <div class="flex-1 flex flex-col w-full ml-0 transition-all duration-300">
        <!-- Header -->
        <header class="bg-white p-2 flex items-center justify-between relative ">


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
                        <img src="https://img.freepik.com/vector-premium/pagina-formulario-inicio-sesion-usuario-3d_169241-6920.jpg?ga=GA1.1.701017138.1745780684&semt=ais_hybrid&w=740"
                            class="w-8 h-8 rounded-full" alt="Profile">
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
    @livewireScripts
</body>

</html>
