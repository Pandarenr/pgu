<x-app-layout>
    <x-slot name="title">Отзыв {{$data->user->name." ".$data->user->second_name}}</x-slot>
        <table class="my-10 min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="form-table-head-field">
                        Текст
                    </th>
                    <th class="form-table-head-field">
                        Дата
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="form-table-field">
                        {{$data->text}}
                    </th>
                    <th class="form-table-field">
                        {{$data->created_at}}
                    </th>
                </tr>
            </tbody>
        </table>
</x-app-layout>