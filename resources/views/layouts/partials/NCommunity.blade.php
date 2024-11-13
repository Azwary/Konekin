<div class="container mx-auto">
    <div class="grid grid-cols-12">
        <div class="col-span-full overflow-y-auto mt-12 w-full h-[640px] mb-6 flex flex-wrap gap-6 justify-center items-center mx-auto font-poppins">

            @php
                $myCommunities = [];
                $joinedCommunities = [];
                $otherCommunities = [];

                foreach($komunitas as $community) {
                    if ($community->KEY == Auth::user()->KEY) {
                        $myCommunities[] = $community;
                    } elseif (auth()->user()->joints->contains('id_komunitas', $community->id_komunitas)) {
                        $joinedCommunities[] = $community;
                    } else {
                        $otherCommunities[] = $community;
                    }
                }

                $sortedCommunities = array_merge($myCommunities, $joinedCommunities, $otherCommunities);
            @endphp

            @foreach($sortedCommunities as $community)

                <!-- Card -->
                <div class="w-60 p-2 bg-white rounded-lg transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">
                    <!-- Image -->
                    <img class="h-40 w-full object-cover rounded-lg" src="{{$community->image_komunitas }}" alt="">
                    <div class="p-2">
                        <!-- Heading -->
                        <h2 class="font-bold text-slate-900 text-lg mb-2">{{ $community->nama_komunitas }}</h2>
                        <!-- Description -->
                    </div>
                    <!-- CTA -->

                    <div class="m-2 text-sm">
                        @if ($community->KEY == Auth::user()->KEY)
                            <div class="mt-3 mb-3 text-xs font-medium text-black">My Community</div>
                            <a role='button' href="{{ route('mycommunity.Event',['id_komunitas'=> $community->id_komunitas]) }}" class="text-white p-6 transition delay-50 bg-red-500 px-3 py-1 rounded-md hover:bg-red-600">See Community</a>
                        @elseif (auth()->user()->joints->contains('id_komunitas', $community->id_komunitas))
                            <div class="mt-3 mb-3 text-xs font-medium text-black">Joined</div>
                            <a role='button' href='{{ route('mycommunity.Event',['id_komunitas'=> $community->id_komunitas]) }}' class="text-white p-6 transition delay-50 bg-purple-600 px-3 py-1 rounded-md hover:bg-purple-700">See Community</a>
                            {{-- <a role='button' href='{{ route('Community.join',['id_komunitas'=> $community->id_komunitas]) }}' class="text-white p-6 bg-purple-600 px-3 py-1 rounded-md hover:bg-purple-700">My Community</a> --}}
                        @else
                            <div class="mt-3 mb-3 text-black">-</div>
                            <a role='button' href='{{ route('mycommunity.Event',['id_komunitas'=> $community->id_komunitas])}}' class="text-white p-6 bg-purple-600 px-3 py-1 rounded-md hover:bg-purple-700">See Community</a>
                            {{-- <a role='button' href='{{ route('Community.join',['id_komunitas'=> $community->id_komunitas]) }}' class="text-white p-6 bg-purple-600 px-3 py-1 rounded-md hover:bg-purple-700">See Community</a> --}}
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
