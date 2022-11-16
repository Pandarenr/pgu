<x-app-layout>
    <x-slot name="title">
        {{__('Управление курсами')}}
    </x-slot>
    <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white rounded-md w-full">
            <div class="pt-4">
                @include('common.message')
            </div>
            <div class=" flex items-center justify-between py-6">
                <div>
                    <h2 class="text-gray-600 font-semibold">Список созданных курсов</h2>
                </div>
                <div class="flex items-center justify-between">
                    <a href="{{route('course-create')}}" class="lg:ml-40 ml-10 space-x-8">
                        <button class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                            {{ __('Создать') }}
                        </button>
                    </a>
                </div>
            </div>
            <div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Название
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Описание
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Направление
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Действия
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $el)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $el->name }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm items-center ">
                                            <p class="text-gray-900 whitespace-no-wrap overflow-hidden h-10">
                                                {{ $el->description }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $el->subject->name }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm items-center">
                                            <div class="flex">
                                                <a href="{{route('course-edit',$el->id)}}" class="btn btn-success mr-2">
                                                    {{ __('Редактировать') }}
                                                </a>
                                                <a href="\courses\{{$el->id}}" class="btn btn-primary mr-2">
                                                    {{ __('Подробно') }}
                                                </a>
                                                <form method="POST" action="{{ route('course-delete') }}">
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
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>