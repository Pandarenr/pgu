<x-admin-panel-layout>
    <x-slot name="title">
        {{__('Управление курсами')}}
    </x-slot>

    <div class="w-full">
        <div class="pt-4 flex justify-between">
            <h2 class="text-gray-600 font-semibold">
                Список программ ДО
            </h2>
            <div>
                <a href="{{ route('admin-educationforms-index') }}" class="btn btn-primary">
                    Формы обучения
                </a>
                <a href="{{route('admin-panel')}}" class="btn btn-primary btn-start">
                    {{ __('Назад') }}
                </a>
                <a href="{{route('admin-program-create')}}" class="btn btn-primary btn-end">
                    {{ __('Создать') }}
                </a>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th class="py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Название
                    </th>
                    <th class="py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Описание
                    </th>
                    <th class="py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Направление
                    </th>
                    <th class="py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Действия
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $program)
                    <tr>
                        <td>
                            {{ $program->name }}
                        </td>
                        <td>
                            {{ $program->description }}
                        </td>
                        <td>
                            {{ $program->programCategory->name }}
                        </td>
                        <td>
                            <div class="flex">
                                <a href="{{route('admin-program-edit',$program->id)}}" class="btn btn-success mr-2">
                                    {{ __('Редактировать') }}
                                </a>
                                <a href="\program\{{$program->id}}" class="btn btn-primary mr-2">
                                    {{ __('Подробно') }}
                                </a>
                                <form method="POST" action="{{ route('admin-program-delete',$program->id) }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="id" value="{{ $program->id }}">
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
                {{ $programs->links() }}
            </div>
            <div class="flex flex-1 justify-end items-center">
                <a href="#" class="btn btn-primary justify-end">
                    {{ __('Наверх') }}
                </a>
            </div>
        </div>
    </div>
</x-admin-panel-layout>