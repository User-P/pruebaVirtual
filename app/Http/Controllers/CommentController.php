<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function response(Comment $comment, Request $request)
    {

        $new = $comment->comments()->create([
            'body' => $request->response,
            'user_id' => Auth::user()->id,
            'responseable_id' => $comment->id,
            'responseable_type' => Comment::class,
        ]);
        if ($request->has('file')) {
            $url = Storage::disk('public')->put('comments', $request->file('file'));

            $new->file()->create([
                'fileable_id' => $new->id,
                'url' => $url,
                'fileable_type' => Comment::class,
            ]);
        }

        return redirect()->route('articles.show', $comment->commentable_id);
    }
}
