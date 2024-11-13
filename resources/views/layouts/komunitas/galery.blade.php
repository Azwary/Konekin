
<x-app-layout>
    <section>
        <div class="container mx-auto mt-10 sm:p-6 md:p-4 p-6">

            {{--  --}}
            @php
    $isCommunityOwner = Auth::user()->KEY == $komunitass->KEY;
    $isJoined = $isCommunityOwner || \App\Models\joins::where('id_komunitas', $komunitass->id_komunitas)->where('KEY', auth()->user()->KEY)->exists();
    $Joined = \App\Models\joins::where('id_komunitas', $komunitass->id_komunitas)->where('KEY', auth()->user()->KEY)->exists();
@endphp

<div class="grid grid-cols-12 gap-6">
    <div class="flex col-span-4 w-full items-center justify-end  sm:ms-auto">
        <div>
            <img src="{{ asset($komunitass->image_komunitas) }}" alt="Profile Picture" class="rounded-full h-60 w-60 flex" >
        </div>
    </div>

    <div class="col-span-6 flex-row gap-2 mt-16">
        <div class="sm:ms-10  gap-3  flex font-bold font-poppins items-center text-white sm:text-[16px] md:text-[22px] lg:text-[32px]">{{ $komunitass->nama_komunitas }}

        @if(!$isJoined)
            <form action="{{ route('Community.joinS', ['id_komunitas' => $komunitass->id_komunitas]) }}" method="post" class="flex">
                @csrf
                <button type="submit" class="py-1 text-sm font-normal px-6 bg-[#703fc7] rounded-sm">Join</button>
            </form>
        @elseif($Joined)
            <a href="{{ route('Community.unjoinS', ['id_komunitas' => $komunitass->id_komunitas]) }}">
                <button type="button" class="py-1 text-sm text-slate-950 font-normal px-4 bg-slate-300 rounded-sm flex">Joined</button>
            </a>
        @endif

        @if($isCommunityOwner)
            {{-- <div class="flex justify-end " href="{{ route('mycommunity.Edit', ['id_komunitas' => $komunitass->id_komunitas]) }}" :active="request()->routeIs('contact')"> --}}
            <button>
                <a href="{{ route('mycommunity.Edit', ['id_komunitas' => $komunitass->id_komunitas]) }}"><img src="{{asset('img/icontitik3.svg')}}" alt="Titik Tiga" class="icon-titik3 "></a>
            </button>
        {{-- </div> --}}

        @endif
        </div>

        <div class="flex flex-col mx-10">
            <h1 class="text-base text-slate-200">
                @php
                    $count = 0;
                @endphp
                @foreach ($joint as $join)
                    @if ($join->id_komunitas == $komunitass->id_komunitas)
                        @php
                            $count++;
                        @endphp
                    @endif
                @endforeach
                {{ $count }} Followers
            </h1>
        </div>
        <div>
            <p class="sm:ms-10 font-poppins text-justify text-white text-base mt-8 sm:text-[8px] md:text-[10px] lg:text-[14px]">{{ $komunitass->description_komunitas }} </p>
        </div>

        <div class="mt-10 flex-row mb-6"></div>

        <div class="font-poppins flex flex-row space-x-8 sm:text-xs md:text-sm lg:text-base mt-6 items-center mb-6 ">
            <div class="hidden sm:-my-px sm:ms-10 sm:flex gap-9 ">
                @if($isJoined)
                    <x-nav-link class="text-white" href="{{ route('mycommunity.Event', ['id_komunitas' => $komunitass->id_komunitas]) }}" :active="request()->routeIs('mycommunity.Event', ['id_komunitas' => $komunitass->id_komunitas])">
                        {{ __('Event') }}
                    </x-nav-link>

                    <x-nav-link class="text-white" href="{{ route('mycommunity.Galery', ['id_komunitas' => $komunitass->id_komunitas]) }}" :active="request()->routeIs('mycommunity.Galery', ['id_komunitas' => $komunitass->id_komunitas])">
                        {{ __('Galery') }}
                    </x-nav-link>

                    <x-nav-link class="text-white" href="{{ route('mycommunity.Forum', ['id_komunitas' => $komunitass->id_komunitas]) }}" :active="request()->routeIs('mycommunity.Forum', ['id_komunitas' => $komunitass->id_komunitas])">
                        {{ __('Forum') }}
                    </x-nav-link>

                    @if($isCommunityOwner)
                        <x-nav-link class="text-white" href="{{ route('mycommunity.Edit', ['id_komunitas' => $komunitass->id_komunitas]) }}" :active="request()->routeIs('contact')">
                            {{--  --}}
                        </x-nav-link>


                <div class="justify-end flex-row ">
                    {{-- <button class="py-1 px-2 bg-white hover:bg-purple-500 rounded-sm duration-300">
                        <x-nav-link class=" font-bold text-black my-auto text-justify  border-none" href="{{ route('mycommunity.AddEvent', ['id_komunitas' => $komunitass->id_komunitas]) }}" :active="request()->routeIs('mycommunity.AddEvent', ['id' => $komunitass->id_komunitas])">
                            {{ __('Add Galery') }}
                        </x-nav-link>
                    </button> --}}
                    <button class="py-1 px-2 bg-white hover:bg-purple-500 rounded-sm duration-300">
                        <x-nav-link class="text-black my-auto hover:text-purple border-none text-justify text-sm font-normal" href="{{ route('mycommunity.AddGalery', ['id_komunitas' => $komunitass->id_komunitas]) }}" :active="request()->routeIs('mycommunity.AddEvent', ['id' => $komunitass->id_komunitas])">
                            {{ __('Add Galery') }}
                        </x-nav-link>
                    </button>
                </div>

                    @endif

                @endif


            </div>
        </div>



    </div>

</div>

{{--  --}}

                <div class="container mx-auto ">
                  <div class="grid grid-cols-12 overflow-y-scroll h-96 mt-6">
                    @foreach($galery as $gallery)
                    @if ($gallery->id_komunitas == $komunitass->id_komunitas)
                    {{-- <div class="col-span-6 flex flex-row p-2 h-60 bg-white border border-gray-200 rounded-lg items-center transform transition-all hover:-translate-y-2 duration-300 cursor-pointer relative"> --}}
                        <!-- Image Container -->
                        <div class="col-span-6 p-6 gap-3 flex flex-col font-poppins relative">
                            <div class="w-full h-full">
                                <img class="object-cover w-full h-full rounded" src="{{ asset($gallery->image_path) }}" alt="">
                            </div>
                            <!-- Text Content Container -->
                            @if(!$isCommunityOwner)
                            @elseif ($komunitass->id_komunitas == $gallery->id_komunitas)
                            <div class="flex flex-col items-end absolute top-0 right-0 p-4 text-black mt-2 mr-2">
                                <!-- Replace the "X" button with the trash bin icon -->
                                <div class="bg-purple-900 text-white rounded-full p-2 cursor-pointer" >
                                    <button>
                                        <a href="{{ route('mycommunity.deleteGallery', ['id_komunitas' => $komunitass, 'id' => $gallery->id]) }}" onclick="return confirm('Are you sure you want to delete this gallery?')"><i class="fas fa-trash text-white"></i></a>
                                    </button>
                                </div>
                            </div>
                            @endif
                        </div>



                    {{-- </div> --}}

                    @endif
                    @endforeach

                  </div>
                </div>

                  </div>
             </section>
  </x-app-layout>
