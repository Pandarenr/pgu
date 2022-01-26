<x-app-layout>
    <x-slot name="title">Редактирование курса</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    @include('profile.menu')
                    <div class="p-6 my-auto w-full">
                        <form method="POST" action="{{ route('profile-course-create',$data->id) }}">
                            @csrf

                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Название')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="description" :value="__('Описание')" />

                                <x-input id="description" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-label for="subject_id" :value="__('Направление')" />


                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-label for="password_confirmation" :value="__('Подтверждение пароля')" />

                                <x-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password"
                                                name="password_confirmation" required />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                    {{ __('Уже зарегистрированы?') }}
                                </a>

                                <x-button class="ml-4">
                                    {{ __('Зарегистрироваться') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>