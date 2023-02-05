<x-admin-panel-layout>
    <x-slot name="title">
        Создать Форму обучения
    </x-slot>
    <div class="w-full">
        <a href="{{ route('admin-educationforms-index') }}" class="btn btn-primary">
            Назад
        </a>
        <form method="POST" action="{{ route('admin-educationform-store') }}">
            @csrf
            <label for="name">Название</label>
            <x-input type="text" name="name" id="name" />
            <button class="btn btn-primary">
                Создать
            </button>
        </form>
    </div>
</x-admin-panel-layout>