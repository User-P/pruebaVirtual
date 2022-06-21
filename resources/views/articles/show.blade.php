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

        <div class="grid grid-cols-2 bg-gray-800">
            <div class="">
                <h1 class="text-bold text-lg text-white">Comentarios:</h1>

                @foreach ($article->comments as $comment)
                <article class="flex mb-4 text-gray-800 ">
                    <div class="card flex-1 px-2">
                        <div class="card-body bg-gray-100 rounded-lg">
                            <p><b>{{$comment->user->name}}</b> {{$comment->created_at}}</p>
                            {{$comment->body}}
                        </div>
                        <div class="card-footer">

                            @if ($comment->comments->count() > 0)
                            <div class="mt-2 text-sm-center">
                                <h3 class="text-white">Respuestas:</h3>
                                @foreach ($comment->comments as $response)
                                <div class="card flex-1 px-7 mb-1">
                                    <div class="card-body bg-gray-100 rounded-lg">
                                        <p><b>{{$response->user->name}}</b> {{$response->created_at}}</p>
                                        {{$response->body}}
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            @endif

                            <form action="{{route('response', $comment)}}" method="POST">
                                @csrf
                                <div class="flex justify-between mx-7 mt-2 ">
                                    <input type="text" name="response" class="w-full rounded-lg"
                                        placeholder="Escribe tu respuesta" />
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Responder
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </article>

                @endforeach
            </div>
            <div class="flex justify-center">
                <form action="{{route('comments.store', $article)}}" method="POST">
                    @csrf
                    <div class="flex flex-col">
                        <label for="body" class="text-md text-white">Nuevo Comentario:</label>
                        <textarea name="body" id="body" cols="60" rows="15" class="w-full bg-gray-100"></textarea>
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-700">
                            Comentar
                        </button>

                    </div>
                </form>
            </div>
        </div>
</x-app-layout>