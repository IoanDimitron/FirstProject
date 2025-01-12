<x-layout title="Register">
    <center>
        <h1>Register</h1>
        <div class="card d-flex bg-dark text-light" style="width: 500px; padding: 20px;">
            <form method="POST" action="{{ route('register') }}">
                @csrf
 
                <div class="mb-3">
                    <x-input-label for="name" :value="__('Name')" class="form-label" />
                    <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
 
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email')" class="form-label" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
 
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Password')" class="form-label" />
                    <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
 
                <!-- Confirm Password -->
                <div class="mb-3">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />
                    <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
 
                <div class="mb-3">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" 
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>
 
                <x-primary-button class="btn btn-primary">
                    {{ __('Register') }}
                </x-primary-button>
            </form>
        </div>
    </center>
</x-layout>
