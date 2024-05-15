@extends('admin/layout')

@section('content')

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo"></x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="" :errors="$errors" />
        @include('sweetalert::alert')

        <form method="POST" action="{{ url('/admin/user/update') }}?id={{$user->id}}">
            @csrf

            <h2 class="font-weight-bold text-center" style="font-size: 20px;">Edit User</h2>

            <!-- Name -->
            <div>
                <x-label for="fullname" :value="__('Full Name')" />

                <x-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" value="{{ $user->fullname }}" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required />
            </div>

            <!-- Password -->
            <div class="mt-3">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password"
                                 />
            </div>

            <!-- Confirm Password -->
            <div class="mt-3">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" 
                                required 
                                />
            </div>          

            <!-- Role -->
            <div>
                <x-label class="mt-3" for="role" :value="__('Role')" />

                <select style="border-radius: 5px;" class="form-control border-color block mt-1 w-full" id="role" name="role">
                    @if(!empty(old('role')))
                    <option value="{{ old('role') }}" selected>{{ old('role') }}</option>
                    @endif
                    <option value="{{ $role }}" selected>{{ $role }}</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('role'))
                <span class="text-danger">{{ $errors->first('role') }}</span>
                @endif

                <!-- <x-input id="role" class="block mt-1 w-full" type="text" name="role" value="{{ $user->role }}" required autofocus /> -->
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button >
                    <a style="color: #fff;" href="{{ url()->previous() }}">{{ __('Back') }}</a>
                </x-button>

                <x-button class="ml-1">
                    {{ __('Update') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@endSection