<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = "notifications";
    protected $fillable = ["profile_user_id", "type", "reference_id", "status"];
    public function profileUser()
    {
        return $this->belongsTo(ProfileUser::class, 'profile_user_id');
    }
    public function reference()
    {
        return $this->morphTo();
    }

}
