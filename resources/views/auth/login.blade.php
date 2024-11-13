<x-guest-layout class="font-poppins">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="px-28 ">
        @csrf

        <div class="flex flex-col text-center my-6">
            <h1 class="text-slate-100 font-normal text-2xl">Welcome back!</h1>
            <h1 class="text-slate-500 font-normal mt-2 text-sm">We're so excited to see you again!</h1>
        </div>
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full " type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                <div class="flex mt-2 mb-4">
                    @if (Route::has('password.request'))
                        <a class="text-slate-500  hover:text-slate-300 font-normal text-xs" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

        </div>

            <div class="flex flex-col  mx-auto  mb-3">
                <div class="flex mt-4 ">
                    <x-primary-button >
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>

               <div class="flex items-center mx-auto space-x-8 mb-3 mt-6">
                <div class="flex  mt-2">
                    <a class="text-slate-500  hover:text-slate-300 font-normal text-xs" href="{{ route('register') }}">
                        {{ __('Dont have an account?') }}
                    </a>
                </div>


               </div>
            </div>


        </div>
    </form>
    {{-- @include('layouts.credit') --}}
</x-guest-layout>
