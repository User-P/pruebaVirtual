<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Article $article, Request $request)
    {

        $article->comments()->create([
            'body' => $request->body,
            'user_id' => Auth::user()->id,
            'commentable_id' => $article->id,
            'commentable_type' => Article::class,
        ]);


        return redirect()->route('articles.show', $article->id);
    }
}
