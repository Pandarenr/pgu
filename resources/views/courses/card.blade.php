<x-app-layout>
    <x-slot name="title">Курсы</x-slot>
    <div class="py-12 container mx-auto ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <div class="relative">
                        <div class="absolute flex items-center ml-2 h-full">
                            <svg class="w-4 h-4 fill-current text-primary-gray-dark" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z"></path>
                            </svg>
                        </div>

                        <input type="text" placeholder="Поиск..." class="px-8 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                    </div>

                        <div class="pb-4 flex items-center justify-between mt-4">
                            <select class="w-40 px-4 py-3 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                                <option value="1">Категория</option>
                                <option value="3">Судья по проведению мероприятий ГТО</option>
                                <option value="2">Инструктор-проводник по пешеходному туризму</option>
                                <option value="4">Секретарь-администратор</option>
                            </select>

                            <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
                                Сбросить фильтр
                            </button>
                        </div>
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
                                    <a href="\courses\{{$el->id}}" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">Подробно</a>
                                  </div>
                               </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="px-5 py-5 flex flex-col xs:flex-row items-center xs:justify-between">
                        <div class="inline-flex mt-2 xs:mt-0 text-center">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
