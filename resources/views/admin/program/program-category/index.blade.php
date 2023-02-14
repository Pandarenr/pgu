<x-admin-panel-layout>
    <x-slot name="title">
        Категории программ
    </x-slot>
    <div class="w-full">
        <a href="{{ route('admin-programcategory-create') }}" class="btn btn-primary">
            Создать
        </a>
        <a href="{{ route('admin-programs-index') }}" class="btn btn-primary">
            Назад
        </a>
        <table>
            <thead>
                <th>
                    Название
                </th>
                <th>
                    Кол-во программ
                </th>
                <th>
                    Дата изменения
                </th>
                <th>
                    Действия
                </th>
            </thead>
            @foreach($data as $item)
                <tr>
                    <td>
                        {{ $item->name }}
                    </td>
                    <td>
                        {{ $item->programs->count() }}
                    </td>
                    <td>
                        {{ $item->updated_at }}
                    </td>
                    <td>
                        <div class="flex justify-center">
                            <a href="{{ route('admin-programcategory-edit',$item->id) }}" class="btn btn-primary">
                                Редактировать
                            </a>
                            <form method="POST" action="{{ route('admin-programcategory-delete',$item->id) }}">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <button class="btn btn-danger"
                                    @if($item->programs->count() !== 0)
                                        onclick="return confirm(
                                            'Это не пустая категория. При её удалении будут удалены и все входящие в неё программы.'
                                        )"
                                    @endif
                                >
                                    Удалить
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</x-admin-panel-layout>