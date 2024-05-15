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

        <div class="mb-4 text-sm text-gray-600">
        <img class="mb-5 m-auto" style=" width: 110px; height: 110px; border-radius: 50%;" src="{{ asset('logo.jpeg')}}">

            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>