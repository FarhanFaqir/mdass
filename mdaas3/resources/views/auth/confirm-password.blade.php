<x-guest-layout>
    <x-auth-card>
    <x-slot name="logo">
            <a href="/">
                <div style="background-color: #fff; margin-bottom: -40px; width: 100%; border-top-left-radius: 5%; border-top-right-radius: 5px;">
                    <!-- <img class="mb-5" style="padding: 30px 130px 30px 130px; " src="{{ asset('images/logo.png')}}" alt=""> -->
                    <h1 class="mb-5" style="padding: 30px 177px; font-weight: bold; font-size: 20px;">Ibn e Sina</h1>
                    <!-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> -->
                </div>And I will offer extra revisions so that you can tell me for future changes as well.
            </a> 
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
