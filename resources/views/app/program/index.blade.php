<x-app-layout>
    <div class="flex space-x-4">
        <x-slot name="title">Курсы</x-slot>
        <div class="w-64 pt-8 shrink-0 flex flex-col space-y-4">
            {{-- Search --}}
            <div class="relative">
                <div class="absolute flex items-center ml-2 h-full">
                    @include('parts.svg.search')
                </div>
                <input type="text" placeholder="Поиск..." class="px-8 py-3 w-full bg-gray-200 focus:ring-0">
            </div>
            {{-- Filters --}}
            <select class="w-full px-4 py-3 bg-gray-200">
                <option value="1">Категория</option>
                <option value="3">Судья по проведению мероприятий ГТО</option>
                <option value="2">Инструктор-проводник по пешеходному туризму</option>
                <option value="4">Секретарь-администратор</option>
            </select>
            <button class="w-full px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium">
                Сбросить фильтр
            </button>
        </div>
        <div class="w-full mt-8">
            {{-- Programs cards block --}}
            <div class="flex flex-wrap -mx-4">
                @foreach ($data as $el)
                    <div class="w-full md:w-1/2 xl:w-1/3 px-4">
                        <div class="bg-gray-200 rounded-lg overflow-hidden mb-10 w-full">
                            <img src="images/univ-main.jpg" alt="image" class="w-full" loading="lazy"/>
                            <div class="pb-8 sm:pb-9 md:pb-7 xl:pb-9 px-8 sm:px-9 md:px-7 xl:px-9 text-center">
                            <h3 class="h-20 flex items-center justify-center mt-4">
                                <a href="" class=" font-semibold text-dark text-xl sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px] block hover:text-primary">
                                    {{$el->name}}
                                </a>
                            </h3>
                            <p class="text-base text-body-color leading-relaxed mb-7 h-20 overflow-hidden">
                                {{$el->description}}
                            </p>
                            <a href="\programs\{{$el->id}}" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">Подробно</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Programs cards paginate block --}}
            <div class="flex items-center justify-center">
                    {{ $data->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
