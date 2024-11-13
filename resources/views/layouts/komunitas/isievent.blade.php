@php
    $isCommunityOwner = Auth::user()->KEY == $komunitass->KEY;
    $isJoined =
        $isCommunityOwner ||
        \App\Models\joins::where('id_komunitas', $komunitass->id_komunitas)
            ->where('KEY', auth()->user()->KEY)
            ->exists();
    $Joined = \App\Models\joins::where('id_komunitas', $komunitass->id_komunitas)
        ->where('KEY', auth()->user()->KEY)
        ->exists();
@endphp
<x-app-layout>
    @if ($kegiatan)
        <div class="container mx-auto font-poppins">



            <div class="isievent mt-5 mb-5">
                <div
                    class="gap-6 mb-6  md:grid-cols-2 p-8 transparent outline outline-1 outline-purple-700 rounded-md flex flex-col">

                    <div class="col text-center">
                        <h3 class="text-slate-100 font-semibold text-5xl">{{ $kegiatan->nama_kegiatan }}</h3>
                    </div>
                    <div class="col text-center mt-0">
                        <h5 class="text-xs mb-4 text-slate-300">Date: {{ $kegiatan->tgl_kegiatan }} | Time:
                            {{ $kegiatan->jam_kegiatan }}</h5>
                           <div class="flex justify-center mb-20">
                            <img class="rounded-full " src="{{ asset($kegiatan->gallery) }}"
                            style="max-width: 100%; max-height: 100%; width: 300px; height: 300px;"
                            alt="{{ $kegiatan->gallery }}">
                           </div>
                        <p class="text-sm mt-8 font-medium  text-slate-300 mb-20 text-justify pl-20 ">{{ $kegiatan->detail_kegiatan }}
                        </p>

                        <div class="row mb-10">
                            <div class="grid grid-cols-4 overflow-y-scroll h-96 mt-6">
                            @foreach ($pictures as $picture)
                                @if ($picture->id_kegiatan == $kegiatan->id_kegiatan)
                                    {{-- <img src="{{ asset($picture->picture) }}" style="max-width: 100%; max-height: 100%; width: 300px; height: 200px;" alt="{{ $kegiatan->picture }}"> --}}
                                    <div class="col-span-1 p-6 gap-3 flex flex-col font-poppins relative">
                                        <div class="object-fill h-48 w-96 ">
                                            <img src="{{ asset($picture->picture) }}" class="object-contain max-w-full max-h-full w-300 h-300" alt="{{ $picture->picture }}">

                                        </div>
                                        <!-- Text Content Container -->
                                        <div class="flex flex-col items-end absolute top-0 right-0 p-4 text-black mt-2 mr-2">
                                            <!-- Replace the "X" button with the trash bin icon -->
                                            <div class= " bg-red-900 mt-2 rounded-full p-2 cursor-pointer" >
                                                <button>
                                                    <a href="{{ route('mycommunity.deletePicture', ['id_komunitas' => $komunitass, 'id_kegiatan'=>$kegiatan->id_kegiatan,'id' => $picture->id]) }}" onclick="return confirm('Are you sure you want to delete this gallery?')" class="rounded-full p-2">
                                                        <i class="fas fa-trash text-white text-sm"></i>
                                                    </a>

                                                </button>
                                            </div>
                                        </div>
                                    </div>


                                @endif
                            @endforeach ($pictures)
                        </div>
                        </div>
                        @if ($isCommunityOwner)
                            <form
                                action="{{ route('mycommunity.addPicturePost', ['id_komunitas' => $komunitass->id_komunitas, 'id' => $kegiatan->id_kegiatan]) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div
                                    class="gap-6 mb-6 md:grid-cols-2 p-8 transparent outline outline-1 outline-purple-700 rounded-2xl flex flex-col">
                                    <div class="mt-4">
                                        <label for="picture"
                                            class="block mb-2 text-sm font-medium text-black rounded-2xl text-center bg-white py-3 px-4 dark:text-white">Add
                                            Picture</label>
                                        <input name="picture[]" type="file" id="picture" class="absolute hidden"
                                            multiple />
                                    </div>
                                    <button type="submit"
                                        class="text-white mb-6 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-full rounded-2xl text-center bg-purple-900 py-3 px-4 dark:text-white hover:bg-purple-800">Add</button>
                                </div>
                            </form>
                        @endif

                    </div>


                    <!-- Add more images as needed -->

                </div>

            </div>


        </div>



        <!-- Snap Container -->
    @else
        <p>Event not found</p>
    @endif
</x-app-layout>
