<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;
    protected $table = 'post_comments';
    protected $fillable = ['comment_content','media', 'profile_user_id', 'post_id', 'parent_comment_id'];
    public function profileUser()
    {
        return $this->belongsTo(ProfileUser::class, 'profile_user_id');
    }
    public function userPost()
    {
        return $this->belongsTo(UserPost::class, 'post_id');
    }
    public function parent()
    {
        return $this->belongsTo(PostComment::class, 'parent_comment_id');
    }
    public function children()
    {
        return $this->hasMany(PostComment::class, 'parent_comment_id');
    }
    public function notifcations()
    {
        return $this->morphMany(Notification::class, 'reference');
    }
    public function commentLike()
    {
        return $this->hasMany(CommentLike::class, 'comment_id');
    }
}
