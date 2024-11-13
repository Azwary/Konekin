
@include('SuperUser.partials.navbar')

<section class="content">
{{--
      <header class="top-head container-fluid">
          <div class="headaja py-2">
              @yield('tittle')
          </div>
      </header> --}}
      <!-- Header Ends -->

      <div class="warper container-fluid text-slate-900">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="container">
                        <div class=" font-semibold text-xl text-slate-700 mb-3">
                            <h3>Kelola Komunitas</h3>
                        </div>

                        <form action="{{ route('superuser.update.komunitas', ['id_komunitas' => $komunitass->id_komunitas ]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-3">
                                    <h4>Nama komunitas</h4>
                                </div>
                                <div class="col-3">
                                    <textarea name="new_name" id="namakomunitas" cols="30" rows="3">{{ $komunitass->nama_komunitas }} </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h4>Deskripsi komunitas</h4>
                                </div>
                                <div class="col-3">
                                    <textarea name="description_komunitas" id="namakomunitas" cols="30" rows="3">{{ $komunitass->description_komunitas }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-3">

                                </div>
                                <div class="col-3 flex justify-center">
                                    <button  class="btn btn-primary w-auto" onclick="return confirm('Apakah yakin ingin Melakukan Peruabahan?' );">Simpan</button>
                                    <a href="{{ route('superuser.hapus.komunitas', ['id_komunitas' => $komunitass->id_komunitas]) }}">
                                        {{-- <button type="button" class="btn btn-danger bg-red-400">Hapus</button> --}}
                                        <button type="button" class="btn btn-danger bg-red-400" onclick="return confirm('Apakah yakin ingin menghapus?' );">Hapus</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
      </div>
      <!-- Warper Ends Here (working area) -->


      <footer class="container-fluid footer">
          Copyright &copy; 2023 <a href="#" >@Konekin</a>
          <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
      </footer>


  </section>

