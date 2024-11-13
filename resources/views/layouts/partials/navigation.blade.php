</html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KONEKIN</title>
    <!-- Link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Link CSS ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Link CSS -->
    <link rel="stylesheet" href="{{ asset('style.css')}}">
    <!-- Link Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

  </head>
  <body>
    <section class="vh-200 font-poppins">
        <div class="container py-5  h-100">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg bg-none text-white">
                <!-- Container wrapper -->
                <div class="container px-4 rounded-sm py-3 fixed backdrop-filter backdrop-blur-lg">

                    <div class="flex">
                    <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}">
                                <img src="{{ asset('img/konekin-bulat.png') }}" alt="" class="d-inline-block align-text-top"><h4 class="d-inline-block align-text-top ms-3 mt-2 mr-44">Konekin</h4>

                            </a>
                        </div>
                        <!-- Navigation Links -->
                        <div class="hidden sm:-my-px sm:ms-10 sm:flex gap-9">
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Home') }}
                            </x-nav-link>

                            <x-nav-link :href="route('community')" :active="request()->routeIs('community')">
                                {{ __('Community') }}
                            </x-nav-link>

                            <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                                {{ __('About') }}
                            </x-nav-link>

                            {{-- <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                                {{ __('Contact') }}
                            </x-nav-link> --}}
                        </div>
                    </div>
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6 ">
                        <x-dropdown  class="w-full">
                            <x-slot name="trigger">
                                {{-- <button id="akun" class="navbar-nav inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"> --}}

                                <button  class="px-4 flex py-2 items-center bg-purple-900 rounded rounded-sm">
                                    <div class="text-base">Hello, {{ Auth::user()->name }}</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content" >
                                {{-- <x-dropdown-link :href="route('profile.edit')"> --}}
                                    <x-dropdown-link href="{{ route('profile.dasboard') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    <!-- -->
    <script src="script.js"></script>
    <!-- Script JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
