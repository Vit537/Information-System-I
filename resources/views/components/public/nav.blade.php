{{-- components/public/nav.blade.php --}}

<nav class="bg-white border-gray-200  sticky top-0">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://DevsBrand.dev/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://devsbrand.dev/_image?href=%2F_astro%2Flogo.94z_dL7D.png&w=60&f=webp" class="h-8"
                alt="DevsBrand Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap ">DevsBrand</span>
        </a>

        <button type="submit"
            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
            <i class="fa-brands fa-youtube"></i> Suscribete!
        </button>

        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 ">
                @guest
                    @if (Route::has('login'))
                        <li>
                            <a href="{{ route('login') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">
                                Login
                            </a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">
                                Crear
                            </a>
                        </li>
                    @endif
                @endguest
                @auth
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">
                            Usuario logueado
                            <span class="text-red-500">{{auth()->user()->name}} {{auth()->user()->role}}</span>

                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
