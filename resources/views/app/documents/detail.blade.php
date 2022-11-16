<x-app-layout>
    <x-slot name='title'>{{$documentData->title}}</x-slot>
    <div class="">
        <div class="">
            <h1>{{$documentData->title}}</h1>
            <div class="flex justify-between">
                <div class="">
                    <p class="">
                        {{$documentData->description}}
                    </p>
                </div>
                <div>
                    <div class="w-48">@include('parts.svg.pdf')</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>