@auth
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <x-dropdown>
            <x-slot name="trigger">
                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }} {{ Auth::user()->second_name }}</div>
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>
            <x-slot name="content">
                <x-dropdown-link :href="route('profile-detail')">
                    {{ __('Личный кабинет') }}
                </x-dropdown-link>
                @can('listener-own-request-edit')
                    @if(Auth::user()->haveReview())
                        <x-dropdown-link :href="route('review-edit')">
                            {{ __('Изменить отзыв') }}
                        </x-dropdown-link>
                    @else
                        <x-dropdown-link :href="route('review-create')">
                            {{ __('Оставить отзыв') }}
                        </x-dropdown-link>
                    @endif
                @endcan
                @can('listener-request-edit')
                    <x-dropdown-link :href="route('admin-panel')">
                        {{ __('Панель администратора') }}
                    </x-dropdown-link>
                @endcan
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Выйти') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
@else
    <div class="hidden sm:flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Войти') }}</a>
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Регистрация') }}</a>
    </div>
@endauth