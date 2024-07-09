<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $table = "participants";
    protected $fillable = ['conversation_id', 'profile_user_id', 'joined_at'];
    public function conversation()
    {
        return $this->belongsTo(Conversation::class, 'conversation_id');
    }
    public function profileUsers()
    {
        return $this->belongsTo(ProfileUser::class, 'profile_user_id');
    }
}
