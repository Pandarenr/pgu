<x-app-layout>
    <x-slot name="title">Курс "{{$data->name}}"</x-slot>

    <div class="bg-slate-700 w-full py-20 px-10 container mx-auto">
        <div class='w-full px-32'>
            <div class="sm:flex space-x-7 md:items-start items-center relative mx-auto">

                <div class="mb-4">
                    <img class="rounded-md" src="/images/univ-main.jpg" alt="brad" />
                </div>
                <div class='w-full'>
                    <h1 class="text-slate-100 text-4xl font-bold my-2">{{$data->name}}</h1>
                    <p class="text-slate-100 text-lg tracking-wide mb-6 md:max-w-lg">{{$data->description}}</p>
                </div>
                <a href="{{route('courses')}}" class="border-2 px-6 py-4 rounded-md border-indigo-600 text-slate-100 hover:bg-indigo-600 hover:text-indigo-100 transition duration-75">Назад</a>
            </div>
        </div>
        <div class="mt-8 sm:grid grid-cols-3 sm:space-x-4 w-full px-32">
            <div class="bg-slate-600 p-6 rounded-md mb-4">
            <span class="text-slate-400 text-md">Текст</span>
            <h2 class="text-slate-100 text-2xl font-semibold">Текст</h2>
            </div>
            <div class="bg-slate-600 p-6 rounded-md mb-4">
            <span class="text-slate-400 text-md">Тест</span>
            <h2 class="text-slate-100 text-2xl font-semibold">Тест</h2>
            </div>
            <div class="bg-slate-600 p-6 rounded-md mb-4">
            <span class="text-slate-400 text-md">Предмет</span>
            <h2 class="text-slate-100 text-2xl font-semibold">{{$data->subject->name}}</h2>
            </div>
        </div>
    </div>
</x-app-layout>
