<x-app-layout>
    <x-slot name="title">Редактирование профиля</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    <div class="p-6 w-full">
                        <form method="POST" action="{{ url('/profile') }}">
                            @csrf
                            <div class="mt-1">
                                <x-label for="name" :value="__('Имя')" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $data->name }}" required />
                            </div>
                            <div class="mt-1">
                                <x-label for="second_name" :value="__('Фамилия')" />
                                <x-input id="second_name" class="block mt-1 w-full" type="text" name="second_name" value="{{ $data->second_name }}" required />
                            </div>
                            <div class="mt-1">
                                <x-label for="patronymic" :value="__('Фамилия')" />
                                <x-input id="patronymic" class="block mt-1 w-full" type="text" name="patronymic" value="{{ $data->patronymic }}" required />
                            </div>
                            <div class="mt-1">
                                <x-label for="gender" :value="__('Пол')" />
                                <x-input id="gender" class="block mt-1 w-full" type="text" name="gender" value="{{ $data->gender }}" required />
                            </div>
                            <div class="mt-1">
                                <x-label for="email" :value="__('Электронная почта')" />
                                <x-input id="email" class="block mt-1 w-full" type="text" name="email" value="{{ $data->email }}" required />
                            </div>
                            <div class="mt-1">
                                <x-label for="phone" :value="__('Телефон')" />
                                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" value="{{ $data->phone }}" required />
                            </div>
                            {{-- <div>
                                <x-label for="name" :value="__('Дата рождения')" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $data->age }}" required />
                            </div> --}}
                            <div class="mt-1">
                                <x-label for="age" :value="__('Дата рождения')" />

                                <input id="age" class="border-none block w-full" type="text" name="age" value="{{ $data->age }}" required>
                                {{-- <div class="relative mt-1">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                      <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <input datepicker type="text" class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Выбрать дату">
                                </div> --}}
                            </div>
                            {{-- <div class="mt-1">
                                <x-label for="name" :value="__('Фото профиля')" />

                                <div class="inline-flex rounded-md shadow-sm border-gray-300 border focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-1 w-full">
                                    @include('common.svg.upload')
                                    <input id="name" class="border-none block w-full" type="text" name="name" value="" required>
                                </div>
                            </div> --}}

                            {{-- <div>
                                <x-label for="description" :value="__('Описание')" />
                                <textarea id="description" class="block mt-1 w-full h-40 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="description" required>{{ $course->description }}</textarea>
                            </div> --}}

                            {{-- <select name="subject_id" id="subject_id" class="my-4 block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option @if (!is_null($course)) selected @endif value="">Выберете категорию</option>
                                @if (!is_null($course))
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}" @if ($course && ($subject->id == $course->subject_id)) selected @endif>{{ $subject->name }}</option>
                                    @endforeach
                                @else
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                @endif
                            </select> --}}

                            <div class="py-6 flex">
                                <button type="submit" class="mr-2 btn btn-success">
                                    {{ __('Сохранить') }}
                                </button>
                                <button class="mx-2 btn btn-primary">
                                    {{ __('Отмена') }}
                                </button>
                                <button class="mx-2 btn btn-danger">
                                    {{ __('Назад') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>