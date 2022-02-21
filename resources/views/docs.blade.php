<x-app-layout>
    <x-slot name="title">Документы</x-slot>

    <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mt-4 px-4">
            <h1 class="pl-2 text-slate-100 text-2xl font-bold">
                Основные документы
            </h1>
            <div class="flex items-center justify-center">
                <a href="\documents\upload" class="btn btn-primary mr-2">
                    {{ __('Загрузить') }}
                </a>
            </div>
        </div>
        <div class="max-w-7xl mx-auto">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex flex-wrap -mx-4">
                        @foreach ($data as $el)

                            <div class="w-full md:w-1/2 xl:w-1/3 px-4">
                               <div class="bg-gray-200 rounded-lg overflow-hidden mb-10 w-full pt-4">
                                  <div class="pb-8 sm:pb-9 md:pb-7 xl:pb-9 px-8 sm:px-9 md:px-7 xl:px-9 text-center">
                                    <p class="text-base text-body-color leading-relaxed mb-7 h-20 overflow-hidden">
                                        {{$el}}
                                    </p>
                                    <a href="\storage\{{$el}}" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">Подробно</a>
                                  </div>
                               </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
  </x-app-layout>