<x-app-layout>
    <x-slot name="title">Мои отзывы</x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <table class="my-10 min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="form-table-head-field">
                        {{$field}}
                    </th>
                    <th class="form-table-head-field">
                        {{$field}}
                    </th>
                    <th class="form-table-head-field">
                        {{$field}}
                    </th>
                    <th class="form-table-head-field">
                        {{$field}}
                    </th>
                    <th class="form-table-head-field">
                        {{$field}}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $el)
                <tr>
                    @foreach($el as $field)
                        <th class="form-table-field">
                            {{$field}}
                        </th>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>