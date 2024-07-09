<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emoji extends Model
{
    use HasFactory;
    protected $table = "emojis";
    protected $fillable = ['type_emoji'];
    public function commentLikes()
    {
        return $this->hasMany(CommentLike::class, 'emoji_type_id');
    }
    public function PostLikes()
    {
        return $this->hasMany(PostLike::class, 'emoji_type_id');
    }
}
