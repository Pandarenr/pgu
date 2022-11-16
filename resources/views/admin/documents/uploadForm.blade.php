<x-app-layout>
    <x-slot name="title">
        {{__(("Загрузить документ"))}}
    </x-slot>

    <div class="py-4">
        <form method="POST" action="{{route('admin-upload-document')}}" enctype="multipart/form-data">
            @csrf
            <div>
                <x-label for="title" :value="__('Название')" />
                <x-input id="title" name="title" type="text" value="" requared />
            </div>
            <div>
                <x-label for="description" :value="__('Описание')" />
                <x-textarea id="description" name="description" type="text" />
            </div>
            <div>
                <x-label for="number_of_lists" :value="__('Количество листов')" />
                <x-input id="number_of_lists" name="number_of_lists" type="text" value="" requared />
            </div>
            <div>
                <x-label for="uploaded_document" :value="__('Загрузка документа')"></x-label>
                <x-input id="uploaded_document" name="uploaded_document" type="file"></x-input>
            </div>
            <button class="btn btn-success mt-4">
                {{__('Загрузить')}}
            </button>
        </form>
    </div>
</x-app-layout>