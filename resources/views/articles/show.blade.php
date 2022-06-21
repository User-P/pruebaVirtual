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

                <div>
                    <h1 class="text-bold text-lg">Comentarios:</h1>

                    @foreach ($article->comments as $comment)
                    <article class="flex mb-4 text-gray-800">
                        <div class="card flex-1">
                            <div class="card-body bg-gray-100">
                                <p><b>{{$comment->user->name}}</b></p>
                                {{$comment->body}}
                            </div>
                            {{-- responder a el mensaje --}}
                            <div class="card-footer">
                                {{-- <a href="{{route('comments.response', $comment->id)}}"
                                    class="text-blue-500">Responder</a> --}}

                                @if ($comment->responses->count() > 0)

                                <div class="mt-2">
                                    <h3 class="text-bold text-lg">Respuestas:</h3>
                                    @foreach ($comment->responses as $response)
                                    <article class="flex mb-4 text-gray-800">
                                        <div class="card flex-1">
                                            <div class="card-body bg-gray-100">
                                                <p><b>{{$response->user->name}}</b></p>
                                                {{$response->body}}
                                            </div>
                                        </div>
                                    </article>
                                    @endforeach

                                </div>
                                @endif

                            </div>
                        </div>
                    </article>

                    @endforeach
                </div>

                <div class="flex justify-center">
                    <form action="{{route('comments.store', $article)}}" method="POST">
                        @csrf
                        <div class="flex flex-col">
                            <label for="body" class="text-sm">Comentario:</label>
                            <textarea name="body" id="body" cols="30" rows="10" class="w-full bg-gray-100"></textarea>
                            <button type="submit"
                                class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-700">
                                Comentar
                            </button>

                        </div>
                    </form>
                </div>
            </div>
</x-app-layout>profile