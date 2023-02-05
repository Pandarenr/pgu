<x-admin-panel-layout>
    <x-slot name="title">
        Формы обучения
    </x-slot>
    <div class="w-full">
        <div class="flex">
            <a href="{{ route('admin-educationform-create') }}" class="btn btn-primary">
                Создать
            </a>
            <a href="{{ route('admin-programs-index') }}" class="btn btn-primary">
                Назад
            </a>
        </div>
        <table>
            <thead>
                <th>
                    Название
                </th>
                <th>
                    Дата изменения
                </th>
                <th>
                    Действия
                </th>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td>
                            <div class="flex justify-center">
                                <a href="{{ route('admin-educationform-edit', $item->id) }}" class="btn btn-primary">
                                    Редактировать
                                </a>
                                <form method="POST" action="{{ route('admin-educationform-delete',$item->id) }}">
                                    @csrf
                                    <button class="btn btn-primary">
                                        Удалить
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
</x-admin-panel-layout>