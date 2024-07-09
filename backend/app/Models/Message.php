<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = "messages";
    protected $fillable = ['conversation_id', 'sender_id', 'message_content', 'media_url', 'read_at'];
    public function conversation()
    {
        return $this->belongsTo(Conversation::class, 'conversation_id');
    }
    public function sender()
    {
        return $this->belongsTo(ProfileUser::class, 'sender_id');
    }
    public function notifcations()
    {
        return $this->morphMany(Notification::class, 'reference');
    }
}
