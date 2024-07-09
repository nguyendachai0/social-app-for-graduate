<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    use HasFactory;
    protected $table = "post_likes";
    protected $fillable = ["profile_user_id", 'post_id', 'emoji_type_id'];
    public function profileUser()
    {
        return $this->belongsTo(ProfileUser::class, 'profile_user_id');
    }
    public function userPost()
    {
        return $this->belongsTo(UserPost::class, 'post_id');
    }
    public function emoji()
    {
        return $this->belongsTo(Emoji::class, 'emoji_type_id');
    }
    public function notifcations()
    {
        return $this->morphMany(Notification::class, 'reference');
    }
}
