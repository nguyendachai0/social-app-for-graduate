<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;
    protected $table = "shares";
    protected $fillable = ['profile_user_id', 'post_id', 'recaption', 'shared_at'];
    public function profileUser()
    {
        return $this->belongsTo(ProfileUser::class, 'profile_user_id');
    }
    public function userPost()
    {
        return $this->belongsTo(UserPost::class, 'post_id');
    }
    public function notifcations()
    {
        return $this->morphMany(Notification::class, 'reference');
    }
}
