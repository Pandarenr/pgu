<x-app-layout>
    <x-slot name="title">Оставить отзыв</x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <form action="POST" action="{{route('create-user-review-general')}}">
            @csrf
            <x-input type="text" name="text" value="{{$data->text}}" />
            <div class="">
                <input type="radio" name="like" value="1" @if($data->like==1)checked @endif>
                <label>Положительный отзыв</label>
                <input type="radio" name="like" value="0" @if($data->like==0)checked @endif>
                <label>Отрицательный отзыв</label>
            </div>
        </form>
    </div>
</x-app-layout>