<x-app-layout>
    <x-slot name="title">Документы</x-slot>

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
                                <a href="{{route('detail-document',basename($document->id))}}" class="btn btn-primary mr-2">
                                    {{ __('Подробно') }}
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