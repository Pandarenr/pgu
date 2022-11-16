<x-app-layout>
    <x-slot name="title">Мои заявки</x-slot>
    <div class="mt-8">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="form-table-head-field">
                        Предмет
                    </th>
                    <th class="form-table-head-field">
                        Дата
                    </th>
                    <th class="form-table-head-field">
                        Действия
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $el)
                    <tr>
                        <th class="form-table-field">
                            {{$el->program->name}}
                        </th>
                        <th class="form-table-field">
                            {{$el->updated_at}}
                        </th>
                        <th class="form-table-field">
                            <div class="flex justify-center">
                                <a href="{{route('edit-form-listener-request',$el->id)}}" class="btn btn-primary mr-2">
                                    {{ __('Редактировать') }}
                                </a>
                                <a href="{{route('detail-listener-request',$el->id)}}" class="btn btn-primary mr-2">
                                    {{ __('Подробно') }}
                                </a>
                                <form method="POST" action="{{ route('delete-listener-request',$el->id) }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="id" value="{{ $el->id }}">
                                    <button class="btn btn-danger"  type="submit">
                                        {{ __('Удалить') }}
                                    </button>
                                </form>
                            </div>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>