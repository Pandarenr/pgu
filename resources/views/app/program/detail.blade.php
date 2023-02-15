<x-app-layout>
    <x-slot name="title">Программа "{{$data->name}}"</x-slot>
    @include('parts.message')
    <div class="relative sm:flex justify-center items-center">
        <div class="mb-4">
            <img class="rounded-md" src="/images/univ-main.jpg" alt="brad" />
        </div>
        <div class="flex flex-col w-full justify-center items-center">
            <h1 class="text-4xl font-bold my-2">
                {{$data->name}}
            </h1>
            <div class="pt-6 flex">
                <a href="{{route('programs-index')}}" class="btn btn-primary">
                    {{ __('Назад') }}
                </a>
            </div>
        </div>
    </div>
    <div class="sm:grid grid-cols-4 sm:space-x-4 w-full">
        <div class="bg-slate-600 p-6 rounded-md mb-4">
            <span class="text-slate-400 text-md">
                {{__('Длительность')}}
            </span>
            <h2 class="text-slate-100 text-2xl font-semibold">
                {{$data->duration}}
            </h2>
        </div>
        <div class="bg-slate-600 p-6 rounded-md mb-4">
            <span class="text-slate-400 text-md">
                {{__('Категория обучающихся')}}
            </span>
            <h2 class="text-slate-100 text-2xl font-semibold">
                {{$data->listenerCategory->name}}
            </h2>
        </div>
        <div class="bg-slate-600 p-6 rounded-md mb-4">
            <span class="text-slate-400 text-md">
                {{__('Предмет')}}
            </span>
            <h2 class="text-slate-100 text-2xl font-semibold">
                {{$data->programCategory->name}}
            </h2>
        </div>
        <div class="bg-slate-600 p-6 rounded-md mb-4">
            <span class="text-slate-400 text-md">
                {{__('Цена')}}
            </span>
            <h2 class="text-slate-100 text-2xl font-semibold">
                {{ $data->cost }}
            </h2>
            <span class="text-slate-400 text-md">
                {{__('Форма обучения')}}
            </span>
            <h2 class="text-slate-100 text-2xl font-semibold">
                {{ $data->educationForm->name }}
            </h2>
        </div>
    </div>
    <div class="w-full">
        <p class="text-lg tracking-wide whitespace-pre-line">
            {{$data->description}}
        </p>
    </div>
</x-app-layout>
