<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>KONEKIN</title>

	<meta name="description" content="">
	<meta name="author" content="sis">

	<!-- Link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Link CSS ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Link CSS -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <!-- Link Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
  <!-- Link Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body data-ng-app class="font-poppins">
	<aside class="left-panel ">
        <div class="navigation">
            <div class=" text-center flex flex-col items-center text-white">
                <img src="{{ asset('img/konekin-bulat.png') }}" class="img-circle mb-3" alt="...">
                <h2 class="user-name text-3xl font-semibold mb-1">{{ Auth::user()->name }}</h2>
                <h3 class="user-name mb-1">{{ Auth::user()->email }}<h3>
                 <div class="dropdown user-login bg-purple-800 mt-3 px-4 py-2 rounded-full text-[12px]">
                  <a role="menuitem" onclick="keluar()"  href="{{ route('Superuser.logout') }}"><i class="bi bi-box-arrow-in-left"></i> Log Out</a>
                </div>
          </div>

          <nav class="navigation">
            <ul class="list-unstyled">
                <li class=""><a href="{{ route('superuser.Home') }}"><i class="bi bi-house-door"></i><span class="nav-label">Home</span></a></li>
                <li class="has-submenu "><a href="{{ route('superuser.kelola') }}"><i class="bi bi-person-raised-hand"></i> <span class="nav-label ">Mengelola Komunitas</span></a>
                    {{-- <ul class="list-unstyled">
                      <li><a href="?modul=kasir">Kasir</a></li>
                      <li><a href="?modul=dokter">Dokter</a></li>
                      <li><a href="?modul=kamar">Kamar</a></li>
                      <li><a href="?modul=jenispelayanan">Jenis Pelayanan</a></li>
                    </ul> --}}
              </li>
               <li class="has-submenu "><a href="{{ route('superuser.user') }}"><i class="bi bi-people"></i><span class="nav-label">Mengelola User</span></a></li>
          </ul>
        </nav>
      </div>



  </aside>
  <!-- Aside Ends-->

  {{-- <section class="content">

      <header class="top-head container-fluid">
          <div class="headaja py-2">
              @yield('tittle')
          </div>
      </header>
      <!-- Header Ends -->


      <div class="warper container-fluid">

          @include('SuperUser.SUhome')

      </div>
      <!-- Warper Ends Here (working area) -->


      <footer class="container-fluid footer">
          Copyright &copy; 2023 <a href="#" >@Konekin</a>
          <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
      </footer>


  </section> --}}
  <!-- Content Block Ends Here (right box)-->


</body>
</html>
