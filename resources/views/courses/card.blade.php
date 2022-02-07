<x-app-layout>
    <x-slot name="title">Курсы</x-slot>
    <div class="py-12 container mx-auto ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex flex-wrap -mx-4">
                        @foreach ($data as $el)

                            <div class="w-full md:w-1/2 xl:w-1/3 px-4">
                               <div class="bg-gray-200 rounded-lg overflow-hidden mb-10 w-full">
                                  <img src="images/univ-main.jpg" alt="image" class="w-full" loading="lazy"/>
                                  <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                                     <h3>
                                        <a href="" class=" font-semibold text-dark text-xl sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px] mb-4 block hover:text-primary">
                                            {{$el->name}}
                                        </a>
                                    </h3>
                                    <p class="text-base text-body-color leading-relaxed mb-7 h-20 overflow-hidden">
                                        Lorem ipsum dolor sit amet pretium consectetur adipiscing
                                        elit. Lorem consectetur adipiscing elit.
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
