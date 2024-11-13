
@include('SuperUser.partials.navbar')
 <section class="content">

      {{-- <header class="top-head container-fluid">
          <div class="headaja py-2">
              @yield('tittle')
          </div>
      </header> --}}
      <!-- Header Ends -->


      <div class="warper container-fluid">

        <div class="container">
            <div class="row">
                <div class="col">

                    <div class=" font-semibold text-xl text-slate-700 mb-3">
                        <h3> Dashboard</h3>
                    </div>
                </div>
            </div>

            <div class="row flex flex-row  justify-center  mx-auto ">

                <div class="col-3 ">
                    <div class="card p-6 text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="">
                            <h3 class="card-title">
                                @php
                                $count = 0;
                                @endphp
                                @foreach ($komunitas as $community)
                                    @php
                                        $count++;
                                    @endphp
                                @endforeach
                                {{ $count }}
                        </h3>
                        <p class="card-text">Total Community</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card p-6 text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="">
                            <h3 class="card-title">
                                @php
                                $count = 0;
                                @endphp
                                @foreach ($User as $U)
                                    @php
                                        $count++;
                                    @endphp
                                @endforeach
                                {{ $count }}
                            </h3>
                          <p class="card-text">Total Users</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card p-6 text-white bg-warning mb-3" style="max-width: 18rem;">
                        <div class="">
                            <h3 class="card-title">
                                @php
                                $count = 0;
                                @endphp
                                @foreach ($kegiatan as $K)
                                    @php
                                        $count++;
                                    @endphp
                                @endforeach
                                {{ $count }}
                            </h3>
                          <p class="card-text">Total Kegiatan</p>
                        </div>
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

