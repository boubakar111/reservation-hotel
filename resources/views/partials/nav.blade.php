<nav class="navbar navbar-expand navbar-dark bg-warning">
    <div class="navbar-nav w-100">
        <a class="navbar-brand text-color" href="/">TravelPlanet</a>
        <a class="nav-item nav-link" href="/hotels">Browse Hotels</a>
    </div>
    <div class="pt-4 pb-1 border-t border-gray-200">
        @auth
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="text-indigo-600 hover:text-indigo-900 hover:bg-indigo-50 px-4 py-2 block">Profile</a>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="text-red-600 hover:text-red-900 hover:bg-red-50 px-4 py-2 block" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</button>
                </form>
            </div>
        @endauth
    </div>
</nav>

