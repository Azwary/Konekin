<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Konekin</title>
  <!-- Link CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <!-- Link CSS ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <!-- Link Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
  <!-- Link CSS -->
  <link rel="stylesheet" href="{{ asset('style.css')}}">
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-poppins container antialiased bg-gradient-to-b from-purple-950 to-slate-950 ">
  <div class="min-h-screen">
    <div class="flex items-center mt-8"  >
      <img src="{{ asset('img/konekin-bulat.png')}}" alt="">
      <h1 class="text-white text-lg font-bold mx-2">Konekin</h1>
      <div class="flex flex-grow"></div>
      <div class="flex justify-end">
        <div class="flex justify-end gap-6 text-white font-medium">
          <button class="border border-1  border-fuchsia-700  px-8 py-2 rounded-md  hover:text-purple-800  hover:bg-slate-100 hover:scale-105 transition"><a href="/login " class="text-inherit">Log In</a></button>
          <button class="bg-purple-800 px-4 py-2 rounded-md hover:scale-105 transition" ><a href="/register" class="text-inherit">Sign Up</a></button>
        </div>
      </div>
    </div>
    <div class="mt-40">
      <p class="font-bold  mx-2">
        <span class="text-white font-normal">Assalamualaikum,</span>
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-purple-500 to-blue-500 text-lg">Konekers!</span>
      </p>
      <h1 class="w-full h-full text-left text-8xl  font-semibold bg-clip-text text-transparent bg-gradient-to-r from-purple-500 to-blue-500">Would You Like To Join Or Create a Community?</h1>
      <p class="text-white text-lg mx-2"> <span class="font-bold"> Welcome to Konekin,</span>  where your vision of a strong community becomes a reality</p>
    </div>
    <div class="mt-8 text-white flex items-center ">
      <a href="/login">
        <button class="font-medium gap-2 flex w-auto mx-2 scale-120 bg-purple-800 px-4 py-3 rounded-full hover:scale-105 transition">Get Started
          <img class="animate-bounce" src="{{ asset('img/join.png')}}" alt="">
        </button>
      </a>
    </div>
    @include('layouts.partials.AllCommunity')
    @include('layouts.partials.about')
    @include('layouts.partials.footer')
  </div>
</body>

</html>
