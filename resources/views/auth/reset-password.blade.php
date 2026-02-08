<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
            
            <div class="mb-6 flex justify-center">
                <img src="{{ asset('asset/logo sd bringin01.png') }}" alt="Logo SDN Bringin 01" class="w-20 h-20">
            </div>

            <div class="mb-6 text-center">
                <h2 class="text-xl font-bold text-gray-800">Atur Ulang Kata Sandi</h2>
                <p class="text-sm text-gray-600">Silakan masukkan kata sandi baru untuk akun Anda.</p>
            </div>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <x-input-label for="email" :value="__('Alamat Email')" />
                    <x-text-input id="email" class="block mt-1 w-full bg-gray-50" type="email" name="email" :value="old('email', $request->email)" required autofocus readonly />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" :value="__('Kata Sandi Baru')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi Baru')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <x-primary-button class="w-full justify-center bg-teal-700 hover:bg-teal-800 py-3 text-white font-bold">
                        {{ __('SIMPAN KATA SANDI BARU') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>