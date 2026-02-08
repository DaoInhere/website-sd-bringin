<x-guest-layout>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="min-h-screen flex flex-col bg-gray-100">
        <div class="flex-1 flex items-center justify-center py-16">
    
            <div class="w-full sm:w-96 lg:w-1/3 p-8 bg-white shadow-xl rounded-lg space-y-8">
                
            
                <div class="text-center mb-6">
                    <a href="/" class="mx-auto">
                        <img src="{{ asset('asset/logo sd bringin01.png') }}" alt="Logo Sekolah" class="w-20 h-20 mx-auto">
                    </a>
                    <h2 class="text-2xl font-semibold text-gray-800 mt-4">SDN Beringin 01 Kota Semarang</h2>
                    <p class="text-gray-600 mt-2">Masuk untuk melanjutkan</p>
                </div>


                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
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

                
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-sekolah-hijau shadow-sm focus:ring-sekolah-hijau" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Ingat Saya') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Lupa Kata Sandi?') }}
                            </a>
                        @endif

                        <x-primary-button class="bg-sekolah-hijau hover:bg-sekolah-hijau-dark text-white w-40 py-3 rounded-lg text-center">
                            {{ __('Masuk') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
