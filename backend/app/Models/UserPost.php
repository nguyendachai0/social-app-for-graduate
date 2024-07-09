<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPost extends Model
{
    use HasFactory;
    protected $table = 'user_posts';
    protected $fillable = ['profile_user_id', 'caption', 'media_url', 'shared_count'];
    public function profileUser()
    {
        return $this->belongsTo(ProfileUser::class, 'profile_user_id');
    }
    public function postLikes()
    {
        return $this->hasMany(PostLike::class, 'post_id');
    }
    public function postComments()
    {
        return $this->hasMany(PostComment::class, 'post_id');
    }
    public function notifcations()
    {
        return $this->morphMany(Notification::class, 'reference');
    }
}
