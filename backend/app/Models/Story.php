<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    protected $table = 'stories';
    protected $fillable = ['profile_user_id', 'media_url', 'shared_count'];
    public function profileUser()
    {
        return $this->belongsTo(ProfileUser::class, 'profile_user_id');
    }
}
