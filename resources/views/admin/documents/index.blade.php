<x-admin-panel-layout>
    <x-slot name="title">{{__('Список размещённых документов')}}</x-slot>
    <div class="w-full my-2">
        <div class="flex justify-end" id="model-action-buttons">
            <a href="{{route('admin-document-upload')}}" class="btn btn-primary text-lg">
                {{ __('Загрузить') }}
            </a>
        </div>
        <div class="my-2 py-2">
            <table class="min-w-full">
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
                            <td class="">
                                {{ $document->title }}
                            </td>
                            <td class="">
                                {{ $document->number_of_lists }}
                            </td>
                            <td class="">
                                {{ $document->created_at }}
                            </td>
                            <td class="">
                                <div class="flex justify-center" id="data-action-buttons">
                                    <a href="{{route('document-open',$document->id)}}" class="btn btn-primary mx-2">
                                        {{ __('Просмотреть') }}
                                    </a>
                                    <a href="{{route('document-download',$document->id)}}" class="btn btn-primary mx-2">
                                        {{ __('Скачать') }}
                                    </a>
                                    <form method="POST" action="{{ route('admin-document-delete', $document->id) }}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger mx-2"  type="submit">
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
        </div>
    </div>
</x-admin-panel-layout>