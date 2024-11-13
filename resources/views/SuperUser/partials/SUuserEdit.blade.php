
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
                        @if ($user)
                        <form action="{{ route('superuser.update.user', ['id_user' => $user->id ]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-3">
                                    <h4>Nama komunitas</h4>
                                </div>
                                <div class="col-3">
                                    <textarea name="name" id="namakomunitas" cols="30" rows="3">{{ $user->name }} </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h4>Role</h4>
                                </div>
                                <div class="col-3">
                                    <select name="role" id="namakomunitas"  class="w-full p-2 border rounded-md" value="{{ $user->role }}">
                                        <option value="{{ $user->role }}">{{ $user->role }}</option>
                                        <option value="member">member</option>
                                        <option value="admin_gorup">admin Group</option>
                                        <option value="superuser">superuser</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h4>New Password</h4>
                                </div>
                                <div class="col-3">
                                    <textarea name="password" id="namakomunitas" cols="30" rows="3" ></textarea>
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

