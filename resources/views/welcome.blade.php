<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <section class="relative block pb-20 bg-purple-800">

        <div class="container pt-5 mx-auto lg:pt-24 lg:pb-64">
            <div class="container grid grid-cols-1 mt-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
                @foreach ($articles as $article)

                <div class="flex justify-center">
                    <div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg">
                        <img class=" w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg"
                            src={{Storage::url($article->image->url)}} alt={{$article->title}} />
                        <div class="p-6 flex flex-col justify-start">
                            <h5 class="text-gray-900 text-xl font-medium mb-2">{{$article->title}}</h5>
                            <p class="text-gray-700 text-base mb-4">
                                {{ Str::limit($article->content, 100) }}
                            </p>
                            <a href="{{route('articles.show', $article)}}"
                                class="text-purple-500 hover:text-purple-700">
                                Leer más
                                <p class="text-gray-600 text-xs"> {{$article->created_at}}</p>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>