<x-app-layout>
    <x-slot name="title">
        Создать программу обучения
    </x-slot>

    <form method="POST" action="{{route('admin-create-program')}}">
        @csrf
        <div class="w-full flex flex-col">
            <div>
                <x-label for="name" :value="__('Название')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="" required />
            </div>
            <div>
                <x-label for="description" :value="__('Описание')" />
                <textarea id="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="description" required></textarea>
            </div>
            <div>
                <x-label for="name" :value="__('Форма обучения')" />
                <x-input id="form" class="block mt-1 w-full" type="text" name="education_form" value="" required />
            </div>
            <div>
                <x-label for="name" :value="__('Длительность обучения')" />
                <x-input id="duration" class="block mt-1 w-full" type="text" name="duration" value="" required />
            </div>
            <div>
                <x-label for="name" :value="__('Категория обучающихся')" />
                <x-input id="kategory" class="block mt-1 w-full" type="text" name="listener_category" value="" required />
            </div>
            <div class="">
                <x-label for="name" :value="__('Направление программы')" />
                <select name="program_category_id" id="subject_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" selected>Выберете категорию</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <x-label for="image" :value="__('Изображение')" />
                <input id="image" type="file" name="image" value="" required>
                </div>
            </div>
            <button class="mt-2 btn btn-success">
                {{ __('Создать') }}
            </button>
        </div>
    </form>
</x-app-layout>
