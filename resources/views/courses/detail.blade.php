<x-app-layout>
    <x-slot name="title">Курс "{{$data->name}}"</x-slot>

    <div class="bg-slate-700 w-full py-20 px-10 container mx-auto">

        <div class='w-full px-32'>
            @include('common.message')
            <div class="sm:flex space-x-7 justify-center items-center relative mx-auto">

                <div class="mb-4">
                    <img class="rounded-md" src="/images/univ-main.jpg" alt="brad" />
                </div>
                <div class="flex flex-col w-full justify-center items-center">
                    <h1 class="text-slate-100 text-4xl font-bold my-2 text-center">{{$data->name}}</h1>
                    <h3 class="text-slate-100 text-xl font-bold my-2">{{$data->form}}</h3>
                    <div class="pt-6 flex">
                        <a href="{{route('courses-main-page')}}" class="btn btn-primary">{{ __('Назад') }}</a>
                        @can('course-edit')
                            <a href="{{route('course-edit',$data->id)}}" class="btn btn-success">
                                    {{ __('Редактировать') }}
                            </a>
                        @endcan
                        @can('listener-own-request-edit')
                            @if($canSubscribe)
                                    <div class="ml-4 btn btn-danger w-full">
                                        <p>{{ __('Вы уже записаны') }}</p>
                                    </div>
                            @endif
                            @if(!$canSubscribe)
                                <form method="POST" action="{{ route('listener-request-create',$data->id) }}">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{$data->id}}">
                                    <button class="btn btn-success ml-2"@if($canSubscribe) disabled @endif type="submit">{{ __('Подать заявку') }}</button>
                                </form>
                            @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8 sm:grid grid-cols-4 sm:space-x-4 w-full px-32">
            <div class="bg-slate-600 p-6 rounded-md mb-4">
            <span class="text-slate-400 text-md">Длительность</span>
            <h2 class="text-slate-100 text-2xl font-semibold">{{$data->duration}}</h2>
            </div>
            <div class="bg-slate-600 p-6 rounded-md mb-4">
            <span class="text-slate-400 text-md">Категория обучающихся</span>
            <h2 class="text-slate-100 text-2xl font-semibold">{{$data->kategory}}</h2>
            </div>
            <div class="bg-slate-600 p-6 rounded-md mb-4">
            <span class="text-slate-400 text-md">Предмет</span>
            <h2 class="text-slate-100 text-2xl font-semibold">{{$data->subject->name}}</h2>
            </div>
            <div class="bg-slate-600 p-6 rounded-md mb-4">
            <span class="text-slate-400 text-md">Цена</span>
            <h2 class="text-slate-100 text-2xl font-semibold">{{__('10 000 рублей')}}</h2>
            </div>
        </div>
        <div class="mt-8 w-full px-32">
            <p class="text-slate-100 text-lg tracking-wide mb-6 whitespace-pre-line">{{$data->description}}</p>
        </div>
    </div>
</x-app-layout>
