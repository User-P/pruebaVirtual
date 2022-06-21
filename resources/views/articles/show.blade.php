<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articulo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-2xl mx-auto bg-white p-16">

                        <div class="flex justify-between items-center">
                            <div class="flex-1">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    {{$article->title}}
                                </h3>
                                <p class="mt-1 text-base leading-6 text-gray-500">
                                    {{$article->created_at}}
                                </p>
                            </div>
                            {{-- mostrar el content y la imagen del articulo --}}
                            <div class="flex-1">
                                <img class="w-full h-auto object-cover" src={{Storage::url($article->image->url)}}
                                alt={{$article->title}} />
                                <p class="text-base leading-6 text-gray-500">
                                    {{$article->content}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>profile