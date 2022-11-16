<x-app-layout>
    <x-slot name="title">Оставить отзыв</x-slot>
    <div class="py-8">
        <h1 class="text-lg font-medium">
            {{__('Оставить отзыв')}}
        </h1>
        <div class="border my-2">
        </div>
        <form method="POST" action="{{route('create-user-review')}}">
            @csrf
            <div class="flex items-center pb-2">
                <label class="text-base font-medium">
                    {{__('Оценка:')}}
                </label>
                <x-alpine-rating :name="('rating')" />
            </div>
            <textarea name="text" type="text" class="w-full resize-none bg-white border-2 border-gray-300 shadow-lg px-3 py-2 rounded-lg focus:outline-none focus:border-indigo-500" rows="6" placeholder="Поле для отзыва"></textarea>
            <div class="flex justify-end pt-2">
                <button class="btn btn-primary relative right-0">
                    {{__('Отправить отзыв')}}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>