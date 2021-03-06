<x-app-layout>
    <x-slot name="title">Профиль</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- About Section -->
            <div class="bg-white p-8 rounded-md w-full">
                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 pb-4">
                    <span clas="text-green-500">
                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                    <span class="tracking-wide">Заявка {{__($data->id)}}</span>
                </div>
                <div class="p-4 w-full">
                    <img src="\images\user-avatar.png" width="120px" height="120px" alt="">
                </div>
                <div class="text-gray-700">
                    <div class="text-sm">
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">
                                {{__('ФИО')}}
                            </div>
                            <div class="px-4 py-2">
                                {{__($data->name." ".$data->second_name." ".$userData->patronymic)}}
                            </div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">
                                {{__('Пол')}}
                            </div>
                            <div class="px-4 py-2">
                                {{__($userData->gender)}}
                            </div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">
                                {{__('Возраст')}}
                            </div>
                            <div class="px-4 py-2">
                                {{__($userData->age)}}
                            </div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">
                                {{__('Почта')}}
                            </div>
                            <div class="px-4 py-2">
                                {{__($data->email)}}
                            </div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">
                                {{__('Номер телефона')}}
                            </div>
                            <div class="px-4 py-2">
                                {{__($data->phone)}}
                            </div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">
                                {{__('Курс')}}
                            </div>
                            <div class="px-4 py-2">
                                {{__($data->course->name)}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <form method="POST" action="{{ route('request-delete') }}">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <button class="mr-2 ml-auto btn btn-primary block text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4" type="submit">
                            {{ __('Удалить') }}
                        </button>
                    </form>

                    <a href="/profile/requests">
                        <button class="ml-2 mr-auto btn btn-primary block text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">{{__('Назад')}}</button>
                    </a>
                </div>
            </div>
            <!-- End of about section -->
        </div>
    </div>
  </x-app-layout>