<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'status',
        'sent_at',
        'responded_at'
    ];
    public function sender()
    {
        return $this->belongsTo(ProfileUser::class, 'sender_id');

    }
    public function receiver()
    {
        return $this->belongsTo(ProfileUser::class, 'reciver_id');
    }
    public function notifcations()
    {
        return $this->morphMany(Notification::class, 'reference');
    }

}
