
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo"></x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors :errors="$errors" />
        @include('sweetalert::alert')

        <form method="POST" action="{{ route('register') }}">
            <img class="mb-5 m-auto" style=" width: 110px; height: 110px; border-radius: 50%;" src="{{ asset('logo.jpeg')}}">

            @csrf

            <!-- <h2 class="font-weight-bold text-center" style="font-size: 20px;">Register New User</h2> -->

            <!-- Name -->
            <div class="mt-3">
                <x-label for="name" :value="__('Full Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-3">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-3">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-3">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <input type="hidden" name="role" value="client">

           
            <div class="flex items-center justify-end mt-4">

                <x-button>
                    <a style="color: #fff;" href="{{ url()->previous() }}">{{ __('Back') }}</a>
                </x-button>

                <x-button class="ml-1">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
