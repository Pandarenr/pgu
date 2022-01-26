<x-app-layout>
    <x-slot name="title">Создание курса</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    @include('profile.menu')
                    <div class="p-6 w-full">
                        <form method="POST" action="{{ route('profile-course-create',Auth::user()->id) }}">
                            @csrf

                            <div>
                                <x-label for="name" :value="__('Название')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" required />
                            </div>

                            <div>
                                <x-label for="description" :value="__('Описание')" />

                                <textarea id="description" class="block mt-1 w-full h-40 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="description" required></textarea>
                            </div>

                            <select name="subject_id" id="subject_id" class="my-4 block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                @foreach ($data as $el)
                                    <option value="{{ $el->id }}">{{ $el->name }}</option>
                                @endforeach
                            </select>

                            <button class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                                {{ __('Создать') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>