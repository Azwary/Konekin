<x-app-layout>

    <div class="container mx-auto">

        <div class="text-2xl mt-6 font-medium text-white mb-6 font-poppins">
            Setting your community:
        </div>

        <div class="grid gap-6 grid-cols-12 ">

            <div class="col-span-12 flex justify-center ">
                <form action="{{ route('mycommunity.update', ['id_komunitas' => $komunitass->id_komunitas]) }}"
                    method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div
                        class="max-w-screen-2xl border border-slate-700 rounded-xl mx-auto shadow-md font-poppins p-5 mb-6 bg-slate-100 flex flex-col">
                        <label for="new_image" class="block font-semibold mb-2 text-slate-800">Change Image</label>
                        <input type="file" name="new_image" id="new_image"
                            class="px-3 py-3 border text-white text-semibold border-slate-900 bg-purple-900 shadow rounded-lg w-full text-sm">
                    </div>

                    <div
                        class="max-w-screen-2xl border border-slate-700 rounded-xl mx-auto shadow-md font-poppins p-5 mb-6 bg-slate-100 flex flex-col">
                        <label for="new_name" class="block font-semibold mb-2 text-slate-800">Rename Community</label>
                        <input type="text" name="new_name" value="{{ $komunitass->nama_komunitas }}" id="new_name"
                            class="resize-none overflow-hidden px-3 py-3 border text-white text-semibold border-slate-900 bg-purple-900 shadow rounded-lg w-full text-sm"
                            data-original-value="{{ $komunitass->nama_komunitas }}" onfocus="clearInput(this)"
                            onblur="restoreOriginalValue(this)">
                    </div>

                    <div
                        class="max-w-screen-2xl border border-slate-700 rounded-xl mx-auto shadow-md font-poppins p-5 mb-6 bg-slate-100 flex flex-col">
                        <label for="description_komunitas" class="block font-semibold mb-2 text-slate-800">Update
                            Description</label>
                        <textarea name="description_komunitas" id="description_komunitas"
                            class="resize-none h-screen overflow-hidden px-3 py-3 border text-white text-semibold border-slate-900 bg-purple-900 shadow rounded-lg w-full text-sm"
                            data-original-value="{{ $komunitass->description_komunitas }}" onfocus="clearInput(this)"
                            onblur="restoreOriginalValue(this)" oninput="autoResize(this)">{{ $komunitass->description_komunitas }}</textarea>
                    </div>

            </div>
        </div>

        <div class="flex justify-center mt-8 mb-8 gap-6">
            <button
                class="bg-red-700 py-2 px-4 text-white font-poppins rounded-lg hover:bg-red-800 transform transition-transform hover:scale-105">
                <a class="text-inherit"
                    href="{{ route('mycommunity.Event', ['id_komunitas' => $komunitass->id_komunitas]) }}"> Cancel</a>
            </button>
            <button
                class="bg-purple-700 py-2 px-4 text-white font-poppins rounded-lg hover:bg-purple-800 transform transition-transform hover:scale-105">
                Save Changes</button>
            <a class="bg-red-700 py-2 px-4 text-white font-poppins rounded-lg hover:bg-red-800 transform transition-transform hover:scale-105" href="{{ route('mycommunity.Hapus', ['id_komunitas' => $komunitass->id_komunitas]) }}">

                    <i class="fas fa-trash"></i>
            </a>
        </div>

        </form>

    </div>

    {{-- <script>
        // Fungsi untuk mengosongkan nilai input saat diklik
        function clearInput(element) {
            element.value = '';
        }

        // Fungsi untuk mengembalikan nilai input ke nilai aslinya jika tidak ada nilai baru yang dimasukkan
        function restoreOriginalValue(element) {
            var originalValue = element.getAttribute('data-original-value');
            if (element.value === '') {
                element.value = originalValue;
            }
        }

        // Fungsi untuk mengatur tinggi textarea sesuai dengan konten yang dimasukkan
        function autoResize(textarea) {
            textarea.style.height = "auto";
            textarea.style.height = (textarea.scrollHeight) + "px";
        }
    </script> --}}
</x-app-layout>
