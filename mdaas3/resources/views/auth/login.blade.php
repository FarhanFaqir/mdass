<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <div style="background-color: #fff; margin-bottom: -40px; width: 100%; border-top-left-radius: 5%; border-top-right-radius: 5px;">
                    <!-- <img class="mb-5" style="padding: 30px 130px 30px 130px; " src="{{ asset('images/logo.png')}}" alt=""> -->
                    <!-- <h1 class="mb-5" style="padding: 30px 185px; font-weight: bold; font-size: 20px;">Ibn Sina</h1> -->
                    <!-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> -->
                    
                </div>
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
        <img class="mb-5 m-auto" style=" width: 110px; height: 110px; border-radius: 50%;" src="{{ asset('logo.jpeg')}}">

            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <!-- <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> -->

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>