<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function image()
    {
        return $this->morphOne(Image::class, "imageable");
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, "commentable");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
