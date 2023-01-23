<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
        {{ __('Главная') }}
    </x-nav-link>
    <x-nav-link :href="route('catalog-programs')" :active="request()->routeIs('catalog-programs')">
        {{ __('Программы ДО') }}
    </x-nav-link>
    <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
        {{ __('О центре') }}
    </x-nav-link>
    <x-nav-link :href="route('index-documents')" :active="request()->routeIs('index-documents')">
        {{ __('Документы') }}
    </x-nav-link>
</div>