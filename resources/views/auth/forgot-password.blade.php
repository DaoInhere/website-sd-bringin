<x-guest-layout>
    <div class="min-h-screen flex flex-col bg-gray-100">
        <div class="flex-1 flex items-center justify-center py-16">
            <!-- Pembungkus Form Forgot Password -->
            <div class="w-full sm:w-96 lg:w-1/3 p-8 bg-white shadow-xl rounded-lg space-y-8">
                
                <!-- Logo dan Judul Halaman -->
                <div class="text-center mb-6">
                    <a href="/" class="mx-auto">
                        <img src="{{ asset('asset/logo sd bringin01.png') }}" alt="Logo Sekolah" class="w-20 h-20 mx-auto">
                    </a>
                    <h2 class="text-3xl font-semibold text-gray-800 mt-4">Reset Kata Sandi</h2>
                    <p class="text-gray-600 mt-2">Masukkan email Anda untuk mendapatkan tautan reset kata sandi.</p>
                </div>

                <!-- Form Forgot Password -->
                <form method="POST" action="{{ route('password.email') }}">
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

                    <div class="flex items-center justify-between mt-6">
                        <x-primary-button class="bg-sekolah-hijau hover:bg-sekolah-hijau-dark text-white w-full py-3 rounded-lg">
                            {{ __('Kirim Tautan Reset Kata Sandi') }}
                        </x-primary-button>
                    </div>
                </form>

                <!-- Informasi Tambahan -->
                <div class="mt-4 text-center text-sm text-gray-600">
                    {{ __('Jika Anda ingat kata sandi Anda, ') }}
                    <a href="{{ route('login') }}" class="text-sekolah-hijau font-semibold hover:text-sekolah-hijau-dark">
                        {{ __('masuk di sini') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>