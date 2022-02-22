<x-app-layout>
    <x-slot name="title">
        {{__('Управление заявками')}}
    </x-slot>
    <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="pt-4">
            @include('common.message')
        </div>
        <div class=" flex items-center justify-between py-6">
            <div>
                @can('listener-request-edit')
                    <h2 class="text-gray-600 font-semibold">Полученные заявки</h2>
                @endcan
                @can('listener-own-request-edit')
                    <h2 class="text-gray-600 font-semibold">Поданные заявки</h2>
                @endcan
            </div>
            {{-- <div class="flex items-center justify-between">
                <a href="{{route('course-create')}}" class="lg:ml-40 ml-10 space-x-8">
                    <button class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                        {{ __('Создать') }}
                    </button>
                </a>
            </div> --}}
        </div>
        <div class="w-full pt-5 rounded-lg bg-white">
            <div class="relative">
                <div class="absolute flex items-center ml-2 h-full">
                    <svg class="w-4 h-4 fill-current text-primary-gray-dark" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z"></path>
                    </svg>
                </div>

                <input type="text" placeholder="Поиск..." class="px-8 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
            </div>

                <div class="flex items-center justify-between mt-4">
                    <select class="w-40 px-4 py-3 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                        <option value="1">Программа</option>
                        <option value="3">Судья по проведению мероприятий ГТО</option>
                        <option value="2">Инструктор-проводник по пешеходному туризму</option>
                        <option value="4">Секретарь-администратор</option>
                    </select>

                    <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
                        Сбросить фильтр
                    </button>
                </div>


        </div>
        <div class="bg-white rounded-md w-full">
            <div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        courseID
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        userID
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Дата
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Действия
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $el)
                                    <tr @if($el->new)class="bg-green-300"@endif>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $el->id }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $el->course_id }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm items-center ">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $el->user_id }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $el->created_at }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm items-center">
                                            <div class="flex">
                                                <a href="{{ route('listeners-requests-show',$el->id)}}" class="btn btn-primary mr-2">
                                                    {{ __('Подробно') }}
                                                </a>
                                                <form method="POST" action="{{ route('request-delete') }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <input type="hidden" name="id" value="{{ $el->id }}">
                                                    <button class="btn btn-danger"  type="submit">
                                                        {{ __('Удалить') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $data->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>