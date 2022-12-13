<div class="w-60 shrink-0">
    <x-nav.admin-panel-nav-link href="{{route('admin-list-programs')}}" :active="request()->routeIs('admin-list-programs')">
        <div class="mx-3 w-6 h-6 flex justify-left content-center">
            @include('parts.svg.program')
        </div>
        Education Programs
    </x-nav.admin-panel-nav-link>
    <x-nav.admin-panel-nav-link href="{{route('admin-list-users')}}" :active="request()->routeIs('admin-list-users')">
        <div class="mx-3 w-6 h-6 flex justify-left content-center">
            @include('parts.svg.users')
        </div>
        Users
    </x-nav.admin-panel-nav-link>
    <x-nav.admin-panel-nav-link href="{{route('admin-list-documents')}}" :active="request()->routeIs('admin-list-documents')">
        <div class="mx-3 w-6 h-6 flex justify-left content-center">
            @include('parts.svg.document')
        </div>
        Documents
    </x-nav.admin-panel-nav-link>
    <x-nav.admin-panel-nav-link href="{{route('admin-list-listeners-requests')}}" :active="request()->routeIs('admin-list-listeners-requests')">
        <div class="mx-3 w-6 h-6 flex justify-left content-center">
            @include('parts.svg.newspaper')
        </div>
        News
    </x-nav.admin-panel-nav-link>
</div>