<!-- Start of x-app-layout -->
@user
<x-app-layout>
  <!-- Start of font-poppins section -->
  <section class="font-poppins">
      <!-- Start of container div -->
      <div class="container mx-auto mt-16 sm:p-6 md:p-4 p-6">
          <!-- Start of grid layout -->
          <div class="grid grid-cols-12">
              <!-- Start of left column (col-span-4) -->
              <div class="col-span-4 flex flex-col mx-auto">
                <div class="mb-12">
                    <div>
                        <img src="{{ asset('' . Auth::user()->avatar) }}" style="width: 100px; height: 100px; border-radius: 50%;" alt="{{ Auth::user()->name }}">
                    </div>

                </div>
                <div class="flex flex-col mx-auto gap-8 font-sm">
                    <a href="{{ route('profile.dasboard') }}">
                        <button class="bg-purple-700 text-slate-200 font-normal text-sm hover:font-md rounded-sm w-full py-2 px-4 hover:text-black hover:bg-slate-300 forced-colors:appearance-auto" type="button">
                            Dashboard
                        </button>
                    </a>
                    <a href="{{ route('profile.profile') }}">
                        <button class="bg-purple-700 text-slate-200 font-normal text-sm hover:font-md rounded-sm w-full py-2 px-4 hover:text-black hover:bg-slate-300" type="button">
                            Profile
                        </button>
                    </a>
                    <a href="{{ route('profile.edit') }}">
                        <button class="bg-purple-700 text-slate-200 font-normal text-sm hover:font-md rounded-sm w-full py-2 px-4 hover:text-black hover:bg-slate-300" type="button">
                            Edit profil
                        </button>
                    </a>
                </div>
              </div>
              <!-- Start of right column (col-span-8) -->
              <div class="flex col-span-8 flex-col gap-2">
                  @if(Auth::check())
                      <h2 class="mx-4 mb-2  flex justify-start my-auto" style="color: white;">Hello, {{ Auth::user()->name }}</h2>
                      <!-- Start of content section -->
                      <div class="col-8 mt-16 mx-4 my-[150px]">
                          <!-- Example content sections, replace with actual content -->
                          <div class="row gap-20">
                              <div class="row">
                                  <div class="col-4  md-6 mt-4">
                                      <p style="color: white;">Name</p>
                                      <p style="color: white;">Email</p>
                                      <p style="color: white;">Birthday</p>
                                  </div>
                                  <div class="col-4 md-6 mt-4">
                                      <p style="color: white;">{{ Auth::user()->name }} <button></button></p>
                                      <p style="color: white;">{{ Auth::user()->email }}</p>
                                      <p style="color: white;">{{ Auth::user()->Birthdate }}</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Add your additional content here -->
                      <div class="mt-8">
                          <!-- Your additional content goes here -->
                      </div>
                  @endif
              </div>
          </div>
      </div>
  </section>
</x-app-layout>
<!-- End of x-app-layout -->
