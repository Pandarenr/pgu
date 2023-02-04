<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
        {{ __('Главная') }}
    </x-nav-link>
    <x-nav-link :href="route('programs-index')" :active="request()->routeIs('programs-index')">
        {{ __('Программы ДО') }}
    </x-nav-link>
    <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
        {{ __('О центре') }}
    </x-nav-link>
    <x-nav-link :href="route('documents-index')" :active="request()->routeIs('documents-index')">
        {{ __('Документы') }}
    </x-nav-link>
</div>