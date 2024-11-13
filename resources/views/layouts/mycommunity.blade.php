<x-app-layout>
    <section>
        <div class="container mx-auto mt-16 sm:p-6 md:p-4 p-6">

                    <div class="w-full min-h-screen gap-8 flex flex-col items-center mx-auto font-poppins pb-6">
                        <!-- Card -->
                        @foreach ($komunitas as $community)

                        {{-- @forelse --}}
                            @if ($community->KEY == Auth::user()->KEY)
                        <div class="w-full p-8 flex transparent outline outline-1 outline-purple-700 rounded-md transform transition-all hover:-translate-y-2 duration-300 hover:bg-purple-800">
                            <!-- Image -->
                            <img class="rounded-full w-32 h-32" src="{{ $community->image_komunitas }}" alt="">
                            <div class="p-4 flex flex-col justify-center">
                                <!-- Heading -->
                                <h2 class="font-normal text-white text-medium mb-2">{{ $community->nama_komunitas }}</h2>
                                <!-- Description -->
                                <p class="text-sm text-slate-300">{{ $community->description_komunitas }}</p>
                            </div>
                            <!-- CTA -->
                            <div class="flex flex-col justify-center absolute inset-y-0 right-14">
                                <a role='button' href="{{ route('mycommunity.Event',['id_komunitas'=> $community->id_komunitas]) }}" class="text-slate-100 text-bold text-sm hover:text-bold bg-purple-600 px-3 py-2 rounded-sm hover:bg-purple-900">See More</a>
                            </div>
                        </div>
                        @endif
                        {{-- @empty
                            <p>No communities available.</p> --}}
                        {{-- @endforelse --}}
                        @endforeach
                    </div>

        </div>
    </section>
</x-app-layout>
