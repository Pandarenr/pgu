<x-app-layout>
    <x-slot name="title">
        {{__('Список размещённых документов')}}
    </x-slot>
    <div class="py-8">
        @include('parts.message')
        <div class="flex">
            @include('parts.menu.admin-panel-nav')
            <div class="min-w-full">
                {{-- <div class="pt-4 flex justify-between">
                    <h2 class="text-gray-600 font-semibold">
                        Список программ ДО
                    </h2>
                    <div>
                        <a href="{{route('admin-panel')}}" class="btn btn-primary btn-start">
                            {{ __('Назад') }}
                        </a>
                        <a href="{{route('admin-upload-form-document')}}" class="btn btn-primary btn-end">
                            {{ __('Загрузить') }}
                        </a>
                    </div>
                </div>
                <div class="inline-block min-w-full overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Название
                                </th>
                                <th class="py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Описание
                                </th>
                                <th class="py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Кол-во страниц
                                </th>
                                <th class="py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Дата размещения
                                </th>
                                <th class="py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Действия
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($documents as $document)
                                <tr>
                                    <td class="py-5 border-b border-gray-200 bg-white text-sm items-center">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $document->title }}
                                        </p>
                                    </td>
                                    <td class="py-5 border-b border-gray-200 bg-white text-sm items-center ">
                                        <p class="text-gray-900 whitespace-no-wrap overflow-hidden h-10">
                                            {{ $document->description }}
                                        </p>
                                    </td>
                                    <td class="py-5 border-b border-gray-200 bg-white text-sm items-center">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $document->number_of_lists }}
                                        </p>
                                    </td>
                                    <td class="py-5 border-b border-gray-200 bg-white text-sm items-center">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $document->created_at }}
                                        </p>
                                    </td>
                                    <td class="py-5 border-b border-gray-200 bg-white text-sm items-center">
                                        <div class="flex">
                                            <a href="{{route('detail-document',basename($document->path))}}" class="btn btn-primary mr-2">
                                                {{ __('Подробно') }}
                                            </a>
                                            <form method="POST" action="{{ route('admin-delete-document',$document->id) }}">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="id" value="{{ $document->id }}">
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
                    {{ $documents->links() }}
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>