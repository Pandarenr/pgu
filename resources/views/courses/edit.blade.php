<x-app-layout>
    <x-slot name="title">Создание курса</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    <div class="p-6 w-full">
                            <form method="POST" action="{{ url('profile/courses') }}">


                            @csrf

                            @if (!is_null($course))
                                <input type="hidden" name="id" value="{{$course->id}}">
                            @endif

                            <div>
                                <x-label for="name" :value="__('Название')" />
                                @if (!is_null($course))
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $course->name }}" required />
                                @else
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="" required />
                                @endif
                            </div>

                            <div>
                                <x-label for="description" :value="__('Описание')" />

                                @if (!is_null($course))
                                    <textarea id="description" class="block mt-1 w-full h-40 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="description" required>{{ $course->description }}</textarea>
                                @else
                                    <textarea id="description" class="block mt-1 w-full h-40 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="description" required></textarea>
                                @endif
                            </div>

                            <div>
                                <x-label for="name" :value="__('Форма обучения')" />
                                @if (!is_null($course))
                                    <x-input id="form" class="block mt-1 w-full" type="text" name="form" value="{{ $course->form }}" required />
                                @else
                                    <x-input id="form" class="block mt-1 w-full" type="text" name="form" value="" required />
                                @endif
                            </div>

                            <div>
                                <x-label for="name" :value="__('Длительность обучения')" />
                                @if (!is_null($course))
                                    <x-input id="duration" class="block mt-1 w-full" type="text" name="duration" value="{{ $course->duration }}" required />
                                @else
                                    <x-input id="duration" class="block mt-1 w-full" type="text" name="duration" value="" required />
                                @endif
                            </div>

                            <div>
                                <x-label for="name" :value="__('Категория обучающихся')" />
                                @if (!is_null($course))
                                    <x-input id="kategory" class="block mt-1 w-full" type="text" name="kategory" value="{{ $course->kategory }}" required />
                                @else
                                    <x-input id="kategory" class="block mt-1 w-full" type="text" name="kategory" value="" required />
                                @endif
                            </div>

                            <div class="">
                                <x-label for="name" :value="__('Направление программы')" />
                                <select name="subject_id" id="subject_id" class=" block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
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
                                </select>
                            </div>

                            <div>
                                <x-label for="name" :value="__('Цена')" />
                                @if (!is_null($course))
                                    <x-input id="kategory" class="block mt-1 w-full" type="text" name="kategory" value="" required />
                                @else
                                    <x-input id="kategory" class="block mt-1 w-full" type="text" name="kategory" value="" required />
                                @endif
                            </div>

                            <div class="">
                                <x-label for="name" :value="__('Изображение')" />

                                <div class="inline-flex rounded-md shadow-sm border-gray-300 border focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50  w-full">
                                    @include('common.svg.upload')
                                    <input id="name" class="border-none block w-full" type="text" name="name" value="" required>
                                </div>
                            </div>

                            <button class="mt-2 btn btn-success">
                                @if($course)
                                {{ __('Обновить') }}
                                @else
                                {{ __('Создать') }}
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>