@include('SuperUser.partials.navbar')

<section class="content">

    <!-- Header Ends -->

    <div class="warper container-fluid">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class=" font-semibold text-xl text-slate-700 mb-3">
                        <h3>Kelola kegiatan</h3>
                    </div>

                    {{-- <a href="{{ route('superuser.create.kegiatan') }}" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-plus"></span> Buat Kegiatan Baru
                    </a> --}}
                    <br /><br />
                    <div class="alert alert-success" role="alert"></div><br />
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>ID kegiatan</th>
                                <th>Nama kegiatan</th>
                                <th>Detail Kegiatan </th>
                                <th>tanggal kegiatan </th>
                                <th>Aksi</th>
                            </tr>

                            @if ($komunitass)
                                @foreach($kegiatan as $K)
                                    @if ($K->id_komunitas == $komunitass->id_komunitas)
                                        <tr>
                                            <td>{{ $K->id_kegiatan }}</td>
                                            <td>{{ $K->nama_kegiatan }}</td>
                                            <td>{{ $K->detail_kegiatan }}</td>
                                            <td>{{ $K->tgl_kegiatan }} | {{ $K->jam_kegiatan }}</td>
                                            <td>
                                                <form action="{{ route('superuser.edit.kegiatan', ['id_kegiatan' => $K->id_kegiatan]) }}" method="get" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm btn-edit" >Edit</button>
                                                </form>
                                                <a href="{{ route('superuser.hapus.kegiatan', ['id_kegiatan' => $K->id_kegiatan]) }}">
                                                    <button type="submit" class="btn btn-danger btn-sm btn-delete" onclick="return confirm('Apakah yakin ingin menghapus?' );">Delete</button>
                                                </a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">No komunitas found</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Warper Ends Here (working area) -->

    <footer class="container-fluid footer">
        Copyright &copy; 2023 <a href="#">@Konekin</a>
        <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
    </footer>

</section>
