<!-- resources/views/your-view.blade.php -->

<x-app-layout>
    <div class="container mx-auto font-poppins">
        <div class="grid-cols-12 mt-5 mb-5 flex flex-col">
            <form action="{{ route('mycommunity.addGaleryPost', ['id_komunitas' => $komunitass->id_komunitas]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="gap-6 mb-6 md:grid-cols-2 p-8 transparent outline outline-1 outline-purple-700 rounded-2xl flex flex-col">
                    <div class="mt-4">
                        <label for="gallery" class="block mb-2 text-sm font-medium text-black rounded-2xl text-center bg-white py-3 px-4 dark:text-white">Add Photos</label>
                        <input name="gallery[]" type="file" id="gallery" class="absolute hidden" multiple />
                    </div>
                    <button type="submit" class="text-white mb-6 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-full dark:hover:bg-blue-700 dark:focus:ring-blue-800 rounded-2xl text-center bg-purple-900 py-3 px-4 dark:text-white hover:bg-purple-800">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
