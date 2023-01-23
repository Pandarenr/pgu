<div class="w-60 shrink-0">
    <x-nav.admin-panel-nav-link href="{{route('admin-index-programs')}}" :active="request()->routeIs('admin-index-programs')">
        <div class="mr-3 w-6 h-6 flex justify-left content-center">
            @include('parts.svg.program')
        </div>
        Программы ДО
    </x-nav.admin-panel-nav-link>
    <x-nav.admin-panel-nav-link href="{{route('admin-index-users')}}" :active="request()->routeIs('admin-index-users')">
        <div class="mr-3 w-6 h-6 flex justify-left content-center">
            @include('parts.svg.users')
        </div>
        Пользователи
    </x-nav.admin-panel-nav-link>
    <x-nav.admin-panel-nav-link href="{{route('admin-index-documents')}}" :active="request()->routeIs('admin-index-documents')">
        <div class="mr-3 w-6 h-6 flex justify-left content-center">
            @include('parts.svg.document')
        </div>
        Документы
    </x-nav.admin-panel-nav-link>
</div>