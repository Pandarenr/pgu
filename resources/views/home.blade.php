<x-app-layout>
    <x-slot name="title">Главная</x-slot>
    <div class="container mx-auto 2xl:px-40 xl:px-16">
        <div class="mb-6 relative overflow-hidden py-20 flex flex-col lg:flex-row lg:items-center">
            <div class="max-w-7xl mx-auto">
                <div class="relative z-10 pb-8 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">

                <main class="pt-10 mx-auto max-w-7xl px-4 sm:pt-12 sm:px-6 md:pt-16 lg:pt-20 lg:px-8 xl:pt-28">
                    <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900">
                        <span class="block xl:inline">Дополнителное образование на базе ПГУ</span>
                        <span class="block text-indigo-600 xl:inline"></span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">Приамурский государственный университет имени Шолом-Алейхема – это современный образовательный комплекс с развитой инфраструктурой, готовящий специалистов, востребованных в разных отраслях экономики и социокультурной сферы региона.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="{{ route('courses-main-page') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
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
                </main>
                </div>
            </div>
            <div class="flex items-center justify-center w-full h-96 lg:w-1/2">
                <img class="object-cover w-full h-full mx-auto rounded-md lg:max-w-2xl" src="/images/univ-main.jpg" alt="">
            </div>
        </div>

        <!-- <h2 class="pb-2 border-bottom">Hanging icons</h2> -->

        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="geo-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"></path>
            </symbol>
            <symbol id="book" viewBox="0 0 512 512">
                <path fill="var(--ci-primary-color, currentColor)" d="M101.667,400H464V16H100.667A60.863,60.863,0,0,0,40,76.667V430.25h.011c0,.151-.011.3-.011.453,0,35.4,27.782,65.3,60.667,65.3H464V464H100.667C85.664,464,72,448.129,72,430.7,72,414.06,85.585,400,101.667,400ZM360,48.333V221.149l-48.4-42.49L264,220.9V48.333ZM232,48V264h31.641l48.075-42.659L360.305,264H392V48h40V368H136.08L136,48ZM100.667,48H104l.076,320h-2.413A59.793,59.793,0,0,0,72,375.883V76.917A28.825,28.825,0,0,1,100.667,48Z" class="ci-primary"/>
            </symbol>
            <symbol id="bank" viewBox="0 0 512 512">
                <path fill="var(--ci-primary-color, currentColor)" d="M247.759,14.358,16,125.946V184H496V125.638ZM464,152H48v-5.946L248.241,49.642,464,146.362Z" class="ci-primary"/>
                <rect width="416" height="32" x="48" y="408" fill="var(--ci-primary-color, currentColor)" class="ci-primary"/>
                <rect width="480" height="32" x="16" y="464" fill="var(--ci-primary-color, currentColor)" class="ci-primary"/>
                <rect width="32" height="160" x="56" y="216" fill="var(--ci-primary-color, currentColor)" class="ci-primary"/>
                <rect width="32" height="160" x="424" y="216" fill="var(--ci-primary-color, currentColor)" class="ci-primary"/>
                <rect width="32" height="160" x="328" y="216" fill="var(--ci-primary-color, currentColor)" class="ci-primary"/>
                <rect width="32" height="160" x="152" y="216" fill="var(--ci-primary-color, currentColor)" class="ci-primary"/>
                <rect width="32" height="160" x="240" y="216" fill="var(--ci-primary-color, currentColor)" class="ci-primary"/>
            </symbol>
            <symbol id="education" viewBox="0 0 512 512">
                <polygon fill="var(--ci-primary-color, currentColor)" points="368 350.643 256 413.643 144 350.643 144 284.081 112 266.303 112 369.357 256 450.357 400 369.357 400 266.303 368 284.081 368 350.643" class="ci-primary"/>
                <path fill="var(--ci-primary-color, currentColor)" d="M256,45.977,32,162.125v27.734L256,314.3,448,207.637V296h32V162.125ZM416,188.808l-32,17.777L256,277.7,128,206.585,96,188.808,73.821,176.486,256,82.023l182.179,94.463Z" class="ci-primary"/>
            </symbol>
        </svg>

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
    </div>
</x-app-layout>