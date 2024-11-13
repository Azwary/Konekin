
@include('SuperUser.partials.navbar')

<section class="content">
      <div class="warper container-fluid text-slate-900">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="container">
                        <div class=" font-semibold text-xl text-slate-700 mb-3">
                            <h3>Kelola Komunitas</h3>
                        </div>
                        @if ($kegiatan)
                        <form action="{{ route('superuser.update.kegiatan', ['id_kegiatan' => $kegiatan->id_kegiatan ]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-3">
                                    <h4>Nama komunitas</h4>
                                </div>
                                <div class="col-3">
                                    <textarea name="new_name" id="namakomunitas" cols="30" rows="3">{{ $kegiatan->nama_kegiatan }} </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h4>Deskripsi komunitas</h4>
                                </div>
                                <div class="col-3">
                                    <textarea name="description_komunitas" id="namakomunitas" cols="30" rows="3">{{ $kegiatan->detail_kegiatan }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-3">

                                </div>
                                <div class="col-3 flex justify-center">
                                    <button  class="btn btn-primary w-auto" onclick="return confirm('Apakah yakin ingin Melakukan Peruabahan?' );">Simpan</button>
                                </div>
                            </div>
                        </form>
                        @endif
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

