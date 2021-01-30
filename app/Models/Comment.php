<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content', 'status'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function is_post()
    {
        return $this->commentable_type === "App\Models\Post";
    }

    public function is_news()
    {
        return $this->commentable_type === "App\Models\News";
    }
}
