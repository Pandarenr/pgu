<x-app-layout>
    <x-slot name="title">Заявка на курс {{$data->name}}</x-slot>
    <div class="">
        <form method="POST" action="{{route('create-listener-request',$data->id)}}">
            @csrf
            <input type="hidden" name="program_id" value="{{$data->id}}">
            <x-input type="text" name="documents" class="w-full" />
            <button class="btn btn-success">
                {{__('Отправить')}}
            </button>
        </form>
    </div>
</x-app-layout>