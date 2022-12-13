<x-app-layout>
    <x-slot name="title">
        {{__('Список размещённых документов')}}
    </x-slot>
    <div class="py-8">
        @include('parts.message')
        <div class="flex">
            @include('parts.menu.admin-panel-nav')
            <div class="w-full">
                <div class="">
                    <div>
                        <a href="{{route('admin-upload-form-document')}}" class="btn btn-primary">
                            {{ __('Загрузить') }}
                        </a>
                    </div>
                </div>
                <div class="">
                    <table class="">
                        <thead>
                            <tr>
                                <th class="">
                                    Название
                                </th>
                                <th class="">
                                    Описание
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
                                    <td class=" ">
                                        {{ $document->description }}
                                    </td>
                                    <td class="">
                                        {{ $document->number_of_lists }}
                                    </td>
                                    <td class="">
                                        {{ $document->created_at }}
                                    </td>
                                    <td class="">
                                        <div class="flex">
                                            <form method="POST" action="{{ route('admin-delete-document', $document->id) }}">
                                                @csrf
                                                {{ method_field('DELETE') }}
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>