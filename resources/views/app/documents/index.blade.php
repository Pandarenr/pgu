<x-app-layout>
    <x-slot name="title">Документы</x-slot>

    <div class="inline-block min-w-full overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="">
                        Название
                    </th>
                    <th class="">
                        Кол-во страниц
                    </th>
                    <th class="">
                        Дата размещения
                    </th>
                    <th class="">
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
                                <a href="{{route('document-open',$document->id)}}" class="btn btn-primary mx-2">
                                    {{ __('Просмотреть') }}
                                </a>
                                <a href="{{route('document-download',$document->id)}}" class="btn btn-primary mx-2">
                                    {{ __('Скачать') }}
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $documents->links() }}
    </div>
</x-app-layout>