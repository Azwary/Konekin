<x-guest-layout>
    <form method="POST" action="{{ route('register') }} " class="px-28 ">
        @csrf


        <div class="flex justify-center my-6">
            <h1 class="text-slate-100 font-normal text-2xl">Create an account</h1>
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Birthdate -->
        <div class="mt-4">
            <x-input-label for="birthdate" :value="__('Birthdate')" />
            <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="Birthdate" :value="old('Birthdate')" />
            <x-input-error :messages="$errors->get('Birthdate')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                <x-primary-button class="mt-8">
                    {{ __('Register') }}
                </x-primary-button>

        </div>



        <div class="flex flex-col items-center justify-end mt-8">


            <a class="no:underline text-slate-500  hover:text-slate-300 font-normal text-xs" href="{{ route('login') }}">
                {{ __('Already have an account?') }}
            </a>


        </div>
    </form>
</x-guest-layout>
