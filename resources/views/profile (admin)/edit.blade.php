<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto px-8 space-y-6">
            {{-- Card: Profile Info --}}
            <div class="bg-white shadow-sm ring-1 ring-black/5 rounded-2xl overflow-hidden">
                <div class="px-8 py-5 border-b border-gray-300 flex items-center gap-3">
                    <div>
                        <h3 class="text-base font-extrabold text-gray-900">Informasi Profil</h3>
                    </div>
                </div>

                <div class="p-8">
                    <div class="max-w-2xl">
                        @include('profile (admin).partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            {{-- Card: Update Password --}}
            <div class="bg-white shadow-sm ring-1 ring-black/5 rounded-2xl overflow-hidden">
                <div class="px-8 py-5 border-b border-gray-300 flex items-center gap-3">
                    <div>
                        <h3 class="text-base font-extrabold text-gray-900">Keamanan</h3>
                    </div>
                </div>

                <div class="sm:p-8">
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
