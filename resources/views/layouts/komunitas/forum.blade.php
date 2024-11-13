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


                {{-- <div class="justify-end flex-row ">
                    <button class="py-1 px-2 bg-white hover:bg-purple-500 rounded-sm duration-300">
                        <x-nav-link class=" font-bold text-black my-auto text-justify  border-none" href="{{ route('mycommunity.AddEvent', ['id_komunitas' => $komunitass->id_komunitas]) }}" :active="request()->routeIs('mycommunity.AddEvent', ['id' => $komunitass->id_komunitas])">
                            {{ __('Add Event') }}
                        </x-nav-link>
                    </button>
                </div> --}}

                    @endif

                @endif


            </div>
        </div>



    </div>

</div>

           {{--  --}}
            <div class="w-full min-h-screen mb-0 flex-wrap gap-6 flex justify-center items-center mx-auto font-poppins pb-6">

                <!-- Chat Forum Section -->
                <div class="container mx-auto p-8">
                    <div class="bg-slate-300 p-6 rounded-lg shadow-md">
                        <h1 class="text-3xl font-semibold text-slate-700 mb-6">Chat Forum</h1>
                        @if ($comment && $comment->isNotEmpty())
                        @foreach($comment as $C)
                        @php
                        // Fetch the user based on the email
                        $user = App\Models\User::where('KEY', $C->KEY)->first();
                        @endphp
                            @if(Auth::user()->KEY == $C->KEY)

                            <div class="justify-end flex items-start mb-4">
                                <div>
                                    <div class="ml-2 p-3 bg-purple-900 text-white p-2 h-75 rounded-md porum">
                                        <p>{{ $C->comment }}</p>
                                    </div>


                                <div class="text-end">

                                    <div class="ml-2 mt-2 text-sm text-gray-600">{{ $user->name }} | {{ $user->created_at }}</div>
                                </div>

                                </div>
                            </div>





                            @else
                                <div class="justify-start flex flex-col items-start mb-4">
                                    <div class="mr-2 bg-purple-900 text-white h-75 p-2 rounded-md porum">
                                        <p>{{ $C->comment }}</p>
                                    </div>
                                    <div class="text-start ">
                                    <div class="ml-2 mt-2 text-sm text-gray-600 flex flex-col">
                                        <p>{{ $user->name }} | {{ $user->created_at }}</p>
                                    </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        @endif

                    </div>
                    <!-- Comment Section -->
                        <div class="bg-slate-300 mt-6 p-4 rounded-md mb-4 max-h-80 overflow-y-auto">
                            <h2 class="text-2xl font-semibold text-slate-700 mb-4">Chat</h2>
                            <!-- Comment Form -->
                            <form action="{{ route('mycommunity.ForumAdd', ['id_komunitas' => $komunitass->id_komunitas]) }}" method="post">
                                @csrf
                                <div class="mb-4">
                                    {{-- <label for="content" class="block text-sm font-medium text-gray-700"></label> --}}
                                    <textarea id="content" name="content" rows="4" class="mt-1 border text-purple-900 font-semibold p-3 border-gray-300 rounded-md w-full"></textarea>
                                </div>

                                <div class="flex items-center">
                                    <button type="submit"  class="bg-purple-900 hover:bg-purple-950 px-4 text-white p-2 rounded-md">
                                        {{-- <x-nav-link class="text-black my-auto hover:text-purple text-justify text-sm font-normal" href="{{ route('mycommunity.ForumAdd', ['id_komunitas' => $komunitass->id_komunitas]) }}" :active="request()->routeIs('mycommunity.AddEvent',['id'=> $komunitass->id_komunitas])"> --}}
                                            {{ __('send') }}
                                        {{-- </x-nav-link> --}}
                                    </button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
