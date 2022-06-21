<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articulo') }}
        </h2>
    </x-slot>

    <!-- component -->
    <div class="container min-w-full">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="hidden bg-slate-500 md:block">
                <img class="h-auto bg-cover bg-center bg-no-repeat" src={{Storage::url($article->image->url)}}
                alt={{$article->title}} />
            </div>
            <div class="mt-10">

                <div class="animate-fade-in-down mb-1 text-center text-lg text-sky-600">{{$article->title}}</div>
                <div class="animate-fade-in-down mb-8 text-center text-lg text-sky-800">{{$article->user->name}}</div>
                <blockquote>
                    <p class="animate-fade-in-down mx-12 mb-9 text-center text-sm">
                        {{$article->content}}
                    </p>
                </blockquote>
            </div>
        </div>
    </div>
</x-app-layout>profile