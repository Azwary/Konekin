<x-app-layout>
    {{-- <section class="vh-200">
      <div class="container py-5 h-100"> --}}

        <form class="font-poppins" action="{{ route('createcommunity.create') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="#">
            <div class="container  py-5">
              <div class="row d-flex justify-content-center text-white align-items-center">
                  <div class="col-12  col-md-8 col-lg-6 col-xl-9">
                    <p class="justify-center font-medium text-lg">Create Your Community</p>


                    {{-- <div name="id_komunitas">KOM01</div> --}}
                      <div class="bg-purple-900 p-3 rounded rounded-xl text-white">
                          <div class="">
                              <div class="row">
                                  <p class=" text-md mb-1 justify-content-center">Chose Category :</p>
                                    <div class="dropdown ">
                                      <label for="kategori"></label>
                                      <select class="bg-slate-200 text-slate-900 rounded-2" id="kategori" name="id_kategori" required>
                                        <option value=""></option>
                                        @foreach ($kategori as $k )
                                            <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                                        @endforeach
                                      </select>
                                    </div>


                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>

        <style>
          #preview {
              max-width: 100%;
              border-radius: 50%; /* Membuat gambar menjadi bulat */
          }
      </style>

      <div class="createkomunita">
          <div class="container">
              <div class="row d-flex justify-content-center text-white align-items-center">
                  <div class="col-12 col-md-8 col-lg-6 col-xl-9">
                      <div class="bg-purple-900 p-3 rounded rounded-xl text-white">
                          <div class="">
                              <p class="mb-0">Profile Picture</p>
                              <p class="text-sm text-slate-100">Image should be at least 100x100px and in JPEG, JPG, and PNG format.</p>

                              <img id="preview" src="img/konekin-bulat.png" alt="your profile" style="max-width: 100%; max-height: 100%; width: 100px; height: 100px;" class="">
                              <label for="foto" class="form-label"></label>
                              <input class="col-12 p-1 rounded rounded-md text-base bg-slate-100 text-slate-900 mb-4 mx-auto" id="foto" type="file" name="image_komunitas" accept="image/*" onchange="previewImage(event)" required>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <script>
          function previewImage(event) {
              var input = event.target;
              var preview = document.getElementById('preview');

              if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function (e) {
                      preview.src = e.target.result;
                  };

                  reader.readAsDataURL(input.files[0]);
              }
          }
      </script>



        <div class="p-3 mt-5">
        <div class="container">
          <div class="row d-flex justify-content-center align-items-center" >
              <div class="col-12 col-md-8 col-lg-6 col-xl-9">
                  <div class="bg-purple-900 p-3 rounded rounded-xl text-white">
                      <div class="flex flex-col">
                        <p class="kt">About Your Community</p>
                        <div class="mb-4">
                          <input class="col-12 bg-slate-100 text-slate-950 rounded rounded-md" name="nama_komunitas" type="text" id="exampleInputUsername" placeholder="Community name">
                        </div>
                        <div class="mb-4 flex justify-center">
                          <textarea class="col-12 bg-slate-100 text-slate-950 rounded rounded-md" placeholder="Description" name="description_komunitas" id="" required></textarea>
                        </div>

                        <div class="flex flex-row mx-auto gap-3">
                            <button class=" bg-slate-200 rounded-sm font-medium text-slate-950 p-2  px-4 hover:bg-slate-300 " type="submit">Save</button>
                            <a  href="{{ route('community') }}" class=" bg-red-300 rounded-sm font-medium text-slate-950 p-2  px-4 hover:bg-red-400 " type="submit" >Cancle</a>
                        </div>
                      </div>

                  </div>
              </div>
          </div>
        </div>
        </div>
        </form>
        {{-- <br><br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br> --}}
  </x-app-layout>
