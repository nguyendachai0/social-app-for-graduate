<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{
    use HasFactory;
    protected $table = "comment_likes";
    protected $fillable = ['profile_user_id', 'comment_id', 'emoji_type_id'];
    public function profile()
    {
      return  $this->belongsTo(ProfileUser::class, 'profile_user_id');
    }
    public function comment()
    {
        return $this->belongsTo(PostComment::class, 'comment_id');
    }
    public function emoji()
    {
      return $this->belongsto(Emoji::class, 'emoji_type_id');
    }
    public function notifcations()
    {
        return $this->morphMany(Notification::class, 'reference');
    }
    
}
