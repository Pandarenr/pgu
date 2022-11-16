<x-app-layout>
    <x-slot name="title">
        Панель администратора
    </x-slot>
    <div class="py-8">
        <div class="flex">
            @include('parts.menu.admin-panel-nav')
            <div class="">
            </div>
        </div>
    </div>
</x-app-layout>