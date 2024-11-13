<div class="container mx-auto">
  <div class="grid grid-cols-12">
    <div class="col-span-full overflow-y-auto mt-12 w-full h-screen mb-6 flex flex-wrap gap-6 justify-center items-center mx-auto font-poppins">
      @foreach($komunitas as $community)
        <!-- Card -->
        <div class="w-60 p-2 bg-white rounded-lg transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">
          <!-- Image -->
          <img class="h-40 w-full object-cover rounded-lg" src="{{$community->image_komunitas }}" alt="">
          <div class="p-2">
            <!-- Heading -->
            <h2 class="font-bold text-lg mb-2">{{ $community->nama_komunitas }}</h2>
            <!-- Description -->

          </div>
          <!-- CTA -->
          <div class="m-2 text-sm">
            <a role='button' href='{{ route('dashboard') }}' class="text-white p-6 bg-purple-600 px-3 py-1 rounded-md hover:bg-purple-700">See Community</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
