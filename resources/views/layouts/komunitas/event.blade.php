@php
$isJoined = Auth::user()->KEY == $komunitass->KEY || \App\Models\joins::where('id_komunitas', $komunitass->id_komunitas)->where('KEY', auth()->user()->KEY)->exists();
$Joined =  \App\Models\joins::where('id_komunitas', $komunitass->id_komunitas)->where('KEY', auth()->user()->KEY)->exists();
$events = \App\Models\kegiatan::where('id_komunitas', $komunitass->id_komunitas)->get();
@endphp

<x-app-layout>
    <section>
        <div class="container mx-auto mt-10 sm:p-6 md:p-4 p-6 font-poppins">
            @include('layouts.partials.H-profilcommunity')
            @if($isJoined)
            <div class="grid grid-cols-12 mt-5 gap-6 mb-10">
                @forelse ($events as $event)
                    @php
                        $detail_kegiatan = strlen($event->detail_kegiatan) > 97 ? substr($event->detail_kegiatan, 0, 97) . '...' : $event->detail_kegiatan;
                    @endphp
                    <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-6 xl:col-span-6 flex flex-row p-2 bg-white border border-gray-200 rounded-lg hover:shadow-lg cursor-pointer">
                        <!-- Image Container -->
                        <div class="w-1/2 h-full flex-shrink-0">
                            <img class="object-cover w-full h-full rounded" src="{{ asset($event->gallery) }}" alt="">
                        </div>
                        <!-- Text Content Container -->
                        <div class="flex flex-col justify-between p-4 w-1/2 flex-grow">
                            <!-- Date and Time Section -->
                            <a href="{{ route('mycommunity.IsiEvent', ['id_komunitas' => $community->id_komunitas, 'id_kegiatan' => $event->id_kegiatan]) }}" class="h-full">
                                <!-- Title Section -->
                                <div class="mb-4">
                                    <h5 class="text-2xl font-bold text-black dark:text-white">{{ $event->nama_kegiatan }}</h5>
                                </div>
                                <!-- Description Section -->
                                <div class="h-16 overflow-hidden">
                                    <p class="font-normal text-slate-900">{{ $detail_kegiatan }}</p>
                                </div>
                                <!-- Date and Time Section -->
                                <div class="flex flex-col mt-4 place-items-start">
                                    <p class="font-bold text-xs p-1 px-2 rounded-sm bg-purple-900 text-white">{{ $event->tgl_kegiatan }}</p>
                                    <p class="font-bold text-xs p-1 px-2 rounded-sm bg-purple-900 text-white">{{ $event->jam_kegiatan }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="col-span-12"></p>
                @endforelse
            </div>


            @endif
        </section>
    </x-app-layout>
