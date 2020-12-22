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

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function news()
    {
        return $this->belongsToMany(News::class);
    }

    public function getIsActiveAttribute()
    {
        return $this->status === 'active';
    }

    public function getChannelAttribute()
    {
        if ( $this->posts()->with('author', 'comments')->exists() ) {
            return 'Post';
        } else if ( $this->news()->with('author', 'comments')->exists() ) {
            return 'News';
        } else {
            return '/';
        }    
    }

    public function scopeBrowse($query)
    {
        return $query->with('author', 'posts', 'news', 'replies')
            ->withCount('replies')
            ->latest();
    }
}
