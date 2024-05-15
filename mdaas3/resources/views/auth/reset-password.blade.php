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

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
        <img class="mb-5 m-auto" style=" width: 110px; height: 110px; border-radius: 50%;" src="{{ asset('logo.jpeg')}}">
            @csrf

            <img class="mb-5 m-auto" style=" width: 110px; height: 80px;" src="{{ asset('1.png')}}">


            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>