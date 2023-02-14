<x-admin-panel-layout>
    <x-slot name="title">
        Изменение категории студентов
    </x-slot>
    <div class="w-full">
        <a href="{{ route('admin-listenercategories-index') }}" class="btn btn-primary">
            Назад
        </a>
        <form method="POST" action="{{ route('admin-listenercategory-save', $data->id) }}">
            @csrf
            <input type="hidden" name="id" value="{{ $data->id }}">
            <label for="name">
                Название
            </label>
            <x-input type="text" name="name" id="name" value="{{ $data->name }}" />
            <button class="btn btn-primary">
                Сохранить
            </button>
        </form>
    </div>
</x-admin-panel-layout>