<nav x-data="{ open: false, profile: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto flex justify-between h-16">
        <div class="flex">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}">
                    <img class="block h-14 w-auto fill-current text-gray-600" src="/images/logo-large.png">
                </a>
            </div>
            <!-- Navigation Links -->
            @include('parts.menu.main-nav')
        </div>
        <!-- Settings Dropdown -->
        @include('parts.menu.settings')
        <div class="flex sm:hidden">
            <!-- Hamburger Button -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open; profile = false" class="inline-flex items-center justify-center p-2 mr-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Profile Hamburger Button -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="profile = ! profile; open = false" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    @include('parts.svg.hamburger-profile-icon')
                </button>
            </div>
        </div>
    </div>
    @include('parts.menu.responsive')
</nav>
