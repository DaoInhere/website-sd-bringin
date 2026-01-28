<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="min-h-screen flex flex-col bg-gray-100">
        <div class="flex-1 flex items-center justify-center">
            <div class="w-full w-full p-8 bg-white shadow-lg rounded-lg space-y-6">
                <div class="text-center">
                    <a href="/">
                        <x-application-logo-login class="w-20 h-20 fill-current text-sekolah-hijau" />
                    </a>
                    <h2 class="text-2xl font-semibold text-gray-800 mt-4">Login</h2>
                    <p class="text-gray-600 mt-2">Masuk untuk melanjutkan</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="space-y-2">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input 
                            id="email" 
                            class="block w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-sekolah-hijau focus:border-sekolah-hijau transition" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required autofocus 
                            autocomplete="username" 
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="space-y-2 mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input 
                            id="password" 
                            class="block w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-sekolah-hijau focus:border-sekolah-hijau transition" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="current-password" 
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-sekolah-hijau shadow-sm focus:ring-sekolah-hijau" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-primary-button class="bg-sekolah-hijau hover:bg-sekolah-hijau-dark text-white w-full py-3 rounded-lg">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
