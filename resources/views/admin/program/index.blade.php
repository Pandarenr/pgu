<x-admin-panel-layout>
    <x-slot name="title">
        {{__('Управление курсами')}}
    </x-slot>

    <div class="admin-panel-content">
        <div class="admin-panel-content-head">
            <h2 class="text-gray-600 font-semibold">
                Список программ ДО
            </h2>
            <div>
                <a href="{{ route('admin-listenercategories-index') }}" class="btn btn-primary">
                    Категории студентов
                </a>
                <a href="{{ route('admin-educationforms-index') }}" class="btn btn-primary">
                    Формы обучения
                </a>
                <a href="{{route('admin-program-create')}}" class="btn btn-primary">
                    {{ __('Создать') }}
                </a>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>
                        Название
                    </th>
                    <th>
                        Направление
                    </th>
                    <th>
                        Действия
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->programCategory->name }}
                        </td>
                        <td>
                            <div class="flex justify-center">
                                <a href="{{route('admin-program-edit',$item->id)}}" class="btn btn-success mr-2">
                                    {{ __('Редактировать') }}
                                </a>
                                <a href="\program\{{$item->id}}" class="btn btn-primary mr-2">
                                    {{ __('Подробно') }}
                                </a>
                                <form method="POST" action="{{ route('admin-program-delete',$item->id) }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="id" value="{{ $item->id }}">
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
        <div class="flex">
            <div class="flex-1">
            </div>
            <div class="flex-1">
                {{ $data->links() }}
            </div>
            <div class="flex flex-1 justify-end items-center">
                <a href="#" class="btn btn-primary justify-end">
                    {{ __('Наверх') }}
                </a>
            </div>
        </div>
    </div>
</x-admin-panel-layout>