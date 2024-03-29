<!-- Responsive Navigation Menu -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1 border-t border-gray-100">
        <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
            {{ __('Главная') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('programs-index')" :active="request()->routeIs('programs-index')">
            {{ __('Программы ДО') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
            {{ __('О нас') }}
        </x-responsive-nav-link>
    </div>
</div>
<!-- Responsive Profile Menu -->
<div :class="{'block': profile, 'hidden': ! profile}" class="hidden sm:hidden">
    @auth
        <!-- Responsive Settings Options -->
        <div class="w-full absolute bg-white z-50 pt-4 pb-1 border-t border-gray-100">
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile-detail')">
                    {{ Auth::user()->name }} {{ Auth::user()->second_name }}
                </x-responsive-nav-link>
            </div>
            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Выйти') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    @else
        <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('login')">
                    {{ __('Войти') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')">
                    {{ __('Регистрация') }}
                </x-responsive-nav-link>
        </div>
    @endauth
</div>