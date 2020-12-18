<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content'];

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
        if ( $this->posts()->exists() ) {
            return 'Post';
        } else if ( $this->news()->exists() ) {
            return 'News';
        } else {
            return '/';
        }    
    }

    protected $appends = ['channel', 'is_active'];


}
