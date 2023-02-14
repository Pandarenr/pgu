<x-admin-panel-layout>
    <x-slot name="title">
        Создание категории студентов
    </x-slot>
    <div class="w-full">
        <a href="{{ route('admin-listenercategories-index') }}" class="btn btn-primary">
            Назад
        </a>
        <form method="POST" action="{{ route('admin-listenercategory-create') }}">
            @csrf
            <label for="name">
                Название
            </label>
            <x-input type="text" name="name" id="name" value="" />
            <button class="btn btn-primary">
                Создать
            </button>
        </form>
    </div>
</x-admin-panel-layout>