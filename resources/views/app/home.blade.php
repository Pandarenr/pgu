<x-app-layout>
    <x-slot name="title">Главная</x-slot>
    <div class="mb-6 relative overflow-hidden flex flex-col lg:flex-row lg:items-center">
        <div class="relative z-10 pb-8 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
            <div class="pt-10 mx-auto max-w-7xl sm:pt-12 md:pt-16 lg:pt-20 xl:pt-28">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900">
                        <span class="block xl:inline">Дополнителное образование на базе ПГУ</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">Приамурский государственный университет имени Шолом-Алейхема – это современный образовательный комплекс с развитой инфраструктурой, готовящий специалистов, востребованных в разных отраслях экономики и социокультурной сферы региона.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="{{ route('programs-index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                {{__('Курсы')}}
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="{{ route('login') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                                {{__('Войти')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center w-full h-96 lg:w-1/2">
            <img class="object-cover w-full h-full mx-auto rounded-md lg:max-w-2xl" src="/images/univ-main.jpg" alt="">
        </div>
    </div>
    <h1 class="text-4xl font-extrabold text-gray-900">
        <span class="block xl:inline">Мы готовы предложить вам</span>
    </h1>
    <div class="flex flex-wrap -mx-4 py-20">
        <div class="w-full md:w-1/2 xl:w-1/3 px-4">
            <div class="bg-gray-200 rounded-lg overflow-hidden mb-10 w-full">
                <img src="images/univ-main.jpg" alt="image" class="w-full" loading="lazy"/>
                <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                    <h3 class=" font-semibold text-dark text-xl sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px] mb-4 block hover:text-primary">
                        Lorem ipsum
                    </h3>
                    <p class="text-base text-body-color leading-relaxed mb-7 h-20 overflow-hidden">
                        Lorem ipsum dolor sit amet pretium consectetur adipiscing
                        elit. Lorem consectetur adipiscing elit.
                    </p>
                    <a href="#" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">View Details</a>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 px-4">
            <div class="bg-gray-200 rounded-lg overflow-hidden mb-10 w-full">
                <img src="images/univ-main.jpg" alt="image" class="w-full" loading="lazy"/>
                <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                    <h3 class=" font-semibold text-dark text-xl sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px] mb-4 block hover:text-primary">
                        Lorem ipsum
                    </h3>
                    <p class="text-base text-body-color leading-relaxed mb-7 h-20 overflow-hidden">
                        Lorem ipsum dolor sit amet pretium consectetur adipiscing
                        elit. Lorem consectetur adipiscing elit.
                    </p>
                    <a href="#" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">View Details</a>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 px-4">
            <div class="bg-gray-200 rounded-lg overflow-hidden mb-10 w-full">
                <img src="images/univ-main.jpg" alt="image" class="w-full" loading="lazy"/>
                <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                    <h3 class=" font-semibold text-dark text-xl sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px] mb-4 block hover:text-primary">
                        Lorem ipsum
                    </h3>
                    <p class="text-base text-body-color leading-relaxed mb-7 h-20 overflow-hidden">
                        Lorem ipsum dolor sit amet pretium consectetur adipiscing
                        elit. Lorem consectetur adipiscing elit.
                    </p>
                    <a href="#" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">View Details</a>
                </div>
            </div>
        </div>
    </div>
    @if($data)
        <h1 class="text-4xl font-extrabold text-gray-900">
            <span>Отзывы</span>
        </h1>
        <div class="flex flex-wrap py-20 -mx-4">
            @foreach($data as $el)
                <div class="w-1/3 h-32 px-4">
                    <div class="flex bg-gray-200 rounded-lg overflow-hidden">
                        <img class="w-32" src="images/univ-main.jpg" alt="image" loading="lazy"/>
                        <div class="p-8">
                            <h3 class="font-semibold text-dark text-lg">
                                {{$el->user->name}}
                            </h3>
                            <p class="text-sm overflow-hidden">
                                {{$el->text}}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-app-layout>