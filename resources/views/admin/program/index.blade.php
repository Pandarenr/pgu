<x-app-layout>
    <x-slot name="title">
        {{__('Управление курсами')}}
    </x-slot>

    @include('parts.message')

    <div class="pt-4 flex justify-between">
        <h2 class="text-gray-600 font-semibold">
            Список программ ДО
        </h2>
        <div>
            <a href="{{route('admin-panel')}}" class="btn btn-primary btn-start">
                {{ __('Назад') }}
            </a>
            <a href="{{route('admin-create-form-program')}}" class="btn btn-primary btn-end">
                {{ __('Создать') }}
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
                        <td class="py-5 border-b border-gray-200 bg-white text-sm items-center">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $program->name }}
                            </p>
                        </td>
                        <td class="py-5 border-b border-gray-200 bg-white text-sm items-center ">
                            <p class="text-gray-900 whitespace-no-wrap overflow-hidden h-10">
                                {{ $program->description }}
                            </p>
                        </td>
                        <td class="py-5 border-b border-gray-200 bg-white text-sm items-center">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $program->programCategory->name }}
                            </p>
                        </td>
                        <td class="py-5 border-b border-gray-200 bg-white text-sm items-center">
                            <div class="flex">
                                <a href="{{route('admin-edit-program',$program->id)}}" class="btn btn-success mr-2">
                                    {{ __('Редактировать') }}
                                </a>
                                <a href="\program\{{$program->id}}" class="btn btn-primary mr-2">
                                    {{ __('Подробно') }}
                                </a>
                                <form method="POST" action="{{ route('admin-delete-program') }}">
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
        {{ $programs->links() }}
    </div>
</x-app-layout>