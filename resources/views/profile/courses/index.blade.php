<x-app-layout>
    <x-slot name="title">Управление курсами</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    @include('profile.menu')
                    <div class="p-6 w-full">
                        <div class="bg-white p-8 rounded-md w-full">
                            <div class=" flex items-center justify-between pb-6">
                                <div>
                                    <h2 class="text-gray-600 font-semibold">Список созданных курсов</h2>
                                </div>
                                <div class="flex items-center justify-between">
                                    <a href="{{url('profile/'.Auth::user()->id.'/courses/create')}}" class="lg:ml-40 ml-10 space-x-8">
                                        <button class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                                            {{ __('Создать') }}
                                        </button>
                                    </a>
                                </div>
                            </div>
                                <div>
                                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                            <table class="min-w-full leading-normal">
                                                <thead>
                                                    <tr>
                                                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                            Название
                                                        </th>
                                                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                            Описание
                                                        </th>
                                                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                            Направление
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data as $el)
                                                        <tr>
                                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm items-center">
                                                                <div class="ml-3">
                                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                                        {{ $el->name }}
                                                                    </p>
                                                                </div>
                                                            </td>
                                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm items-center ">
                                                                <div class="ml-3 overflow-hidden w-80 h-10">
                                                                    <p class="text-gray-900 whitespace-no-wrap ">
                                                                        {{ $el->description }}
                                                                    </p>
                                                                </div>
                                                            </td>
                                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm items-center">
                                                                <div class="ml-3">
                                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                                        {{ $el->subject->name }}
                                                                    </p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                                                <div class="inline-flex mt-2 xs:mt-0">
                                                        {{ $data->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </x-app-layout>