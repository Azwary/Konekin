<x-app-layout>
    <div class="container mx-auto font-poppins">
        <div class="grid-cols-12 mt-5 mb-5 flex flex-col">
            <form action="{{ route('mycommunity.addEventPost', ['id_komunitas' => $komunitass->id_komunitas]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="gap-6 mb-6 md:grid-cols-2 p-8 transparent outline outline-1 outline-purple-700 rounded-2xl flex flex-col">
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-white dark:text-white mt-6">Event Name</label>
                        <input name="nama_kegiatan" type="text" id="first_name" class="bg-transparent border border-purple-800 text-white text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-purple-700 dark:border-purple-600 dark:placeholder-purple-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="Your event name" required>
                    </div>
                    <div>
                        <label for="detail" class="block mb-2 text-sm font-medium text-white dark:text-white">Detail Event</label>
                        <input name="detail_kegiatan" type="text" id="detail" class="bg-transparent border border-purple-800 text-white text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-purple-700 dark:border-purple-600 dark:placeholder-purple-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="Detail your event" required>
                    </div>
                    <div>
                        <label for="date" class="block mb-2 text-sm font-medium text-white dark:text-white">Date</label>
                        <input name="tgl_kegiatan" type="date"  id="date" class="bg-transparent border border-purple-800 text-white text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-purple-700 dark:border-purple-600 dark:placeholder-purple-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="Event date" required>
                    </div>
                    <div>
                        <label for="time" class="block mb-2 text-sm font-medium text-white dark:text-white">Time</label>
                        <input name="jam_kegiatan" type="time" id="time" class="bg-transparent border border-purple-800 text-white text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-purple-700 dark:border-purple-600 dark:placeholder-purple-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="Event time" required>
                    </div>
                    <div>
                        <label for="slug" class="block mb-2 text-sm font-medium text-white dark:text-white">Slug</label>
                        <input name="slug" type="text" id="slug" class="bg-transparent border border-purple-800 text-white text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-purple-700 dark:border-purple-600 dark:placeholder-purple-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="Event slug" required>
                    </div>
                    <div class="mt-4">
                        <label for="gallery" class="block mb-2 text-sm font-medium text-purple-900 rounded-sm w-full  text-center  bg-slate-100 py-3 px-4  hover:bg-slate-300 ">Add Photo</label>
                        <input name="gallery" type="file" id="gallery" class="absolute hidden" />
                    </div>
                    <button type="submit" class="text-white mb-6 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-full  dark:focus:ring-blue-800 rounded-sm text-center bg-purple-700 py-3 px-4 dark:text-white hover:bg-purple-900">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
