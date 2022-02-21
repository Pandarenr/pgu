<x-app-layout>
    <x-slot name="title">Создание курса</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    <div class="p-6 w-full">
                        {{-- <form method="POST" action="{{ url('documents') }}">
                            @csrf --}}
                            <div class="mt-1">
                                <x-label for="name" :value="__('Документ')" />

                                <div class="inline-flex rounded-md shadow-sm border-gray-300 border focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-1 w-full">
                                    @include('common.svg.upload')
                                    <input id="name" class="border-none block w-full" type="text" name="name" value="" required>
                                </div>
                            </div>
                            <div class="py-6 flex">
                                <button class="mr-2 btn btn-success" type="submit">
                                    {{ __('Загрузить') }}
                                </button>
                                <a href="\documents">
                                    <button class="mx-2 btn btn-primary">
                                        {{ __('Назад') }}
                                    </button>
                                </a>
                            </div>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>