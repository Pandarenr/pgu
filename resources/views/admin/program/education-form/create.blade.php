<x-admin-panel-layout>
    <x-slot name="title">
        Создать Форму обучения
    </x-slot>
    <div class="w-full">
        <form method="POST" action="{{ route('admin-educationform-store') }}">
            @csrf
            <div class="flex flex-col">
                <label for="name">Название</label>
                <x-input type="text" name="name" id="name" />
            </div>
        </form>
    </div>
</x-admin-panel-layout>