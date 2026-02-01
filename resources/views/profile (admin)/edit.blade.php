<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-extrabold tracking-tight text-gray-900">
                    {{ __('Profil Admin') }}
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Kelola informasi akun dan keamanan kata sandi.
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Card: Profile Info --}}
            <div class="bg-white shadow-sm ring-1 ring-black/5 rounded-2xl overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 flex items-center gap-3">
                    <div class="h-10 w-10 rounded-xl bg-teal-50 ring-1 ring-teal-100 flex items-center justify-center">
                        <span class="text-teal-700 font-extrabold">P</span>
                    </div>
                    <div>
                        <h3 class="text-base font-extrabold text-gray-900">Informasi Profil</h3>
                        <p class="text-sm text-gray-500">Nama dan email akun.</p>
                    </div>
                </div>

                <div class="p-6 sm:p-8">
                    <div class="max-w-2xl">
                        @include('profile (admin).partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            {{-- Card: Update Password --}}
            <div class="bg-white shadow-sm ring-1 ring-black/5 rounded-2xl overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 flex items-center gap-3">
                    <div class="h-10 w-10 rounded-xl bg-amber-50 ring-1 ring-amber-100 flex items-center justify-center">
                        <span class="text-amber-700 font-extrabold">K</span>
                    </div>
                    <div>
                        <h3 class="text-base font-extrabold text-gray-900">Keamanan</h3>
                        <p class="text-sm text-gray-500">Perbarui kata sandi akun.</p>
                    </div>
                </div>

                <div class="p-6 sm:p-8">
                    <div class="max-w-2xl">
                        @include('profile (admin).partials.update-password-form')
                    </div>
                </div>
            </div>

            {{-- Delete user (opsional) --}}
            {{-- <div class="bg-white shadow-sm ring-1 ring-black/5 rounded-2xl overflow-hidden">
                <div class="p-6 sm:p-8">
                    <div class="max-w-2xl">
                        @include('profile (admin).partials.delete-user-form')
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</x-app-layout>
