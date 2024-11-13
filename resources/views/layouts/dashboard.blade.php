<x-app-layout>
  <section class="vh-200 font-poppins">
    <div class="container py-0 h-100">

      <div class="mt-12">
        <h1 class="text-8xl text-center font-semibold bg-clip-text text-transparent bg-gradient-to-r from-purple-500 to-blue-500">Ready to Join Your <br>Community Experience</h1>

        <p class="text-white text-center my-4 text-xl">Join the community,<strong> and it's free! </strong></p>

        <div class="mt-5 col-md-4 mx-auto text-center mb-20">
          <a href="{{ route('community') }}">
            <button class="bg-purple-800  px-4 text-slate-300 transition delay-50 font-medium rounded rounded-md hover:bg-purple-900 py-2" type="" id="">Join Community</button>
          </a>
        </div>

      </div>


      @include('layouts.partials.NCommunity')
    </div>
</section>
</x-app-layout>
