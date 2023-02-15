<x-admin-panel-layout>
    <x-slot name="title">
        Создать программу обучения
    </x-slot>
    <div class="w-full">
        <a href="{{ route('admin-programs-index') }}" class="btn btn-primary">
            Назад
        </a>
        <form method="POST" action="{{ route('admin-program-store') }}">
            <div class="flex flex-col">
                @csrf
                <label for="name">
                    Название
                </label>
                <x-input type="text" name="name" id="name" value="{{ $data->name }}" />
                <label for="description">
                    Описание
                </label>
                <textarea id="description" type="text" name="description">{{ $data->description }}</textarea>
                <label for="duration">
                    Длительность обучения
                </label>
                <x-input type="text" name="duration" id="duration" value="{{ $data->duration }}" />
                <label for="cost">
                    Стоимость обучения
                </label>
                <x-input type="text" name="cost" id="cost" value="{{ $data->cost }}" />
                <label for="program_category_id">
                    Категория программы
                </label>
                <select name="program_category_id" id="program_category_id">
                        <option value="" selected>Категория программы</option>
                        @foreach ($programCategories as $item)
                            <option value="{{ $item->id }}" @if($data->program_category_id == $item->id) selected @endif>{{ $item->name }}</option>
                        @endforeach
                </select>
                <label for="listener_category_id">
                    Категория студентов
                </label>
                <select name="listener_category_id" id="listener_category_id">
                        <option value="">Категория студентов</option>
                        @foreach ($listenerCategories as $item)
                            <option value="{{ $item->id }}" @if($data->listener_category_id == $item->id) selected @endif>{{ $item->name }}</option>
                        @endforeach
                </select>
                <label for="education_form_id">
                    Форма обучения
                </label>
                <select name="education_form_id" id="education_form_id">
                        <option value="" selected>Выберите форму обучения</option>
                        @foreach ($educationForms as $item)
                            <option value="{{ $item->id }}" @if($data->education_form_id == $item->id) selected @endif>{{ $item->name }}</option>
                        @endforeach
                </select>
                <label for="image">
                    Изображение
                </label>
                <input id="image" type="file" name="image" value="">
            </div>
            <button class="btn btn-success">
                Создать
            </button>
        </form>
    </div>
</x-admin-panel-layout>