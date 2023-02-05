<x-admin-panel-layout>
    <x-slot name="title">
        Редактирование Формы обучения
    </x-slot>
    <div class="w-full">
        <a href="{{ route('admin-educationforms-index') }}" class="btn btn-primary">
            Назад
        </a>
        <form method="POST" action="{{ route('admin-educationform-save',$data->id) }}">
            @csrf
            <x-label for="name" :value="__('Название')" />
            <input type="hidden" name="id" value="{{ $data->id }}">
            <x-input id="name" name="name" type="text" value="{{ $data->name }}" required />
            <button class="btn btn-primary">
                Изменить
            </button>
        </form>
    </div>
</x-admin-panel-layout>