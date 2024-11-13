<header class="bg-purple-900 rounded rounded-sm mb-8 mt-0 p-3">
    <h2 class="text-lg font-medium text-slate-300 ">
        {{ __('Edit Profile') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600 text-slate-300">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </p>
</header>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-4">
            <x-input-label for="avatar" :value="__('Foto Profile')" />
            <input class="text-white" type="file" class="mt-1 block w-50" id="avatar" name="avatar" accept="image/*">
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-50" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-50" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div>
            <x-input-label for="name" :value="__('Birthdate')" />
            <x-text-input id="Birthdate" name="Birthdate" type="date" class="mt-1 block w-50" :value="old('name', $user->Birthdate)" required autofocus autocomplete="Birthdate" />
            <x-input-error class="mt-2" :messages="$errors->get('Birthdate')" />
        </div>
        <div class="flex items-center gap-4">
            <button class="w-50 bg-purple-900 px-2 py-3 mt-4 text-white rounded-sm mb-10">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
  </div>
