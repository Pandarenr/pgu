<div class="w-60 shrink-0">
    <x-nav.admin-panel-nav-link href="{{route('admin-programs-index')}}" :active="request()->routeIs('admin-programs-index')">
        <div class="mr-3 w-6 h-6 flex justify-left content-center">
            @include('parts.svg.program')
        </div>
        Программы ДО
    </x-nav.admin-panel-nav-link>
    <x-nav.admin-panel-nav-link href="{{route('admin-users-index')}}" :active="request()->routeIs('admin-users-index')">
        <div class="mr-3 w-6 h-6 flex justify-left content-center">
            @include('parts.svg.users')
        </div>
        Пользователи
    </x-nav.admin-panel-nav-link>
    <x-nav.admin-panel-nav-link href="{{route('admin-documents-index')}}" :active="request()->routeIs('admin-documents-index')">
        <div class="mr-3 w-6 h-6 flex justify-left content-center">
            @include('parts.svg.document')
        </div>
        Документы
    </x-nav.admin-panel-nav-link>
</div>