@include('SuperUser.partials.navbar')

<section class="content">

      <div class="warper container-fluid">
        <div class="container">
            <div class="row">
                <div class="col">


                    <div class=" font-semibold text-xl text-slate-700 mb-3">
                        <h3>User</h3>
                    </div>

                    </div><br />
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                {{-- <th>NO</th> --}}
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Birdate</th>
                                <th>Role</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>Aksi</th>

                            </tr>
                       @foreach ($User as $U)
                            <tr>
                                {{-- <td>{{ $loop->iteration}}</td> --}}
                                <td>{{ $U->id }}</td>
                                <td>{{ $U->name }}</td>
                                <td>{{ $U->email }}</td>
                                <td>{{ $U->Birthdate }}</td>
                                <td>{{ $U->role }}</td>
                                <td>{{ $U->created_at }}</td>
                                <td>{{ $U->updated_at }}</td>
                                <td>
                                        <form action="{{ route('superuser.edit.user', ['id_user' => $U->id]) }}" method="get" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm btn-edit" >Edit</button>
                                        </form>
                                        <a href="{{ route('superuser.hapus.user', ['id_user' => $U->id]) }}">
                                            <button type="submit" class=" mt-2 btn btn-danger btn-sm btn-delete" onclick="return confirm('Apakah yakin ingin menghapus?' );">Delete</button>
                                        </a>
                                </td>
                            </tr>
                       @endforeach
                        </table>
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


