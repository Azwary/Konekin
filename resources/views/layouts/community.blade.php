<x-app-layout>

<div class=" container mx-auto font-poppins">

  <div class="grid-cols-12 mt-5 flex flex-col ">
    <h1 class="w-auto text-8xl text-center font-semibold bg-clip-text text-transparent bg-gradient-to-r from-purple-500 to-blue-500">What Communities Can You Join Here?</h1>

        <p class="mt-6 text-center text-lg text-white">Discover different communities here! Find one you like, connect with people who share <br>
        your interests, and enjoy a vibrant community experience with us!.</p>
  </div>
  <div class="text-center mt-12 flex gap-6 justify-center">
          <a href="{{ route('createcommunity.create') }}" class="" ><button class="bg-slate-300 font-medium px-4 transition delay-50 text-slate-900 hover:text-purple-900 rounded rounded-md hover:bg-slate-300 py-2" >Create Community</button></a>
          <a href="{{ route('mycommunity') }}" class=""><button class="bg-purple-900 transition delay-50  px-4 text-slate-300 font-medium rounded rounded-md hover:bg-purple-950    py-2" >My Community</button></a>

          {{-- @if(Auth::member()->hasCommunity())
    <a href="{{ route('mycommunity') }}" class="btn btn-primary">My Community</a>
@else
    <p>Anda belum memiliki komunitas. <a href="{{ route('createcommunity.create') }}">Buat Komunitas</a></p>
@endif --}}

  </div>

  @include('layouts.partials.Community')

</div>

</x-app-layout>
