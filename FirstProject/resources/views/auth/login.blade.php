<x-layout title="Log in">
    <center>
        <h1>Login</h1>
        <div class="card d-flex bg-dark text-light" style="width: 500px;padding: 20px">
 
 
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email')" class="form-label" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Password')" class="form-label" />
 
                    <x-text-input id="password" class="form-control" type="password" name="password" required
                        autocomplete="current-password" />
 
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mb-3 form-check">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
 
 
                    </div>
                </div>
 
                <x-primary-button class="btn btn-primary">
                    {{ __('Log in') }}
                </x-primary-button>
            </form>
        </div>
    </center>
</x-layout>
