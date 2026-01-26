<header class="flex justify-between items-center mb-8 bg-white p-4 rounded-xl shadow-sm border border-gray-100">
    <div class="flex items-center">
        <h1 class="text-2xl font-bold text-gray-800 uppercase tracking-tight">Dashboard Admin</h1>
    </div>

    <div class="flex items-center space-x-8">
        <nav class="flex space-x-6">
            <a href="/" class="text-gray-500 hover:text-teal-600 font-medium transition-colors border-b-2 border-transparent hover:border-teal-600 pb-1">Beranda</a>
            <a href="{{ route('dashboard') }}" class="text-teal-600 font-bold border-b-2 border-teal-600 pb-1">Dashboard</a>
        </nav>

        <div class="h-6 w-[1px] bg-gray-300"></div>

        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                    <div>{{ Auth::user()->name }}</div>
                    <svg class="ms-1 fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                </button>
            </x-slot>
            <x-slot name="content">
                <x-dropdown-link :href="route('profile (admin).edit')">Profile</x-dropdown-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</header>