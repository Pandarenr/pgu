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

                            <select name="subject_id" id="subject_id" class="my-4 block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
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

                            <button class="btn btn-success">
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