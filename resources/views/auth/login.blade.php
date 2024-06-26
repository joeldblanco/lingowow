<x-guest-layout>
    <div class="flex w-full">
        <div class="w-3/5">
            <x-jet-authentication-card>
                <x-slot name="logo">
                    <x-jet-authentication-card-logo />
                </x-slot>

                <p class="text-3xl mb-1 font-black text-lw-blue">Welcome</p>
                <p class="text-xl mb-6 font-bold text-gray-600">Login in to your account</p>

                <x-jet-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />
                    </div>

                    <div class="flex mt-4 justify-between">
                        <label for="remember_me" class="flex items-center">
                            {{-- <x-jet-checkbox id="remember_me" name="remember" /> --}}
                            <input type="checkbox" name="remember" id="remember_me" {{ old('remember') ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="flex flex-col items-center justify-end my-4">
                        <x-jet-button class="mx-1 w-full mt-2 mb-4 py-3">
                            <p class="w-full font-bold">{{ __('Log in') }}</p>
                        </x-jet-button>
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Don't have an
                            account?</a>
                    </div>
                </form>
            </x-jet-authentication-card>
        </div>
        <div class="w-2/5 bg-lw-blue">
            <img src="{{Storage::url('images/login_cover.webp')}}" alt="" class="object-cover h-screen opacity-50">
        </div>
    </div>
</x-guest-layout>
