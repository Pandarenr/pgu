<x-app-layout>
    <x-slot name="title">Редактирование программы {{$program->name}}</x-slot>
    <form method="POST" action="{{ url('profile/courses') }}">
        @csrf
        <input type="hidden" name="id" value="{{$course->id}}">
        <div class="flex w-full">
            <div>
                <x-label for="name" :value="__('Название')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $course->name }}" required />
            </div>
            <div>
                <x-label for="description" :value="__('Описание')" />
                <textarea id="description" class="block mt-1 w-full h-40 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="description" required>{{ $course->description }}</textarea>
            </div>
            <div>
                <x-label for="name" :value="__('Форма обучения')" />
                <x-input id="form" class="block mt-1 w-full" type="text" name="form" value="" required />
            </div>
            <div>
                <x-label for="name" :value="__('Длительность обучения')" />
                <x-input id="duration" class="block mt-1 w-full" type="text" name="duration" value="" required />
            </div>
            <div>
                <x-label for="name" :value="__('Категория обучающихся')" />
                <x-input id="kategory" class="block mt-1 w-full" type="text" name="kategory" value="" required />
            </div>
            <div class="">
                <x-label for="name" :value="__('Направление программы')" />
                <select name="subject_id" id="subject_id" class=" block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    <option value="">Выберете категорию</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id == $program->category_id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <x-label for="name" :value="__('Цена')" />
                <x-input id="kategory" class="block mt-1 w-full" type="text" name="kategory" value="" required />
            </div>
            <div class="">
                <x-label for="name" :value="__('Изображение')" />
                <div class="inline-flex rounded-md shadow-sm border-gray-300 border focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50  w-full">
                    @include('common.svg.upload')
                    <input id="name" class="border-none block w-full" type="text" name="name" value="" required>
                </div>
            </div>
        </div>
        <button class="mt-2 btn btn-success">
            {{ __('Обновить') }}
        </button>
    </form>
</x-app-layout>