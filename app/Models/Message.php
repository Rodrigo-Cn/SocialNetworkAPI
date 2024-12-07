<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = ['text','user_sender_id','user_receiver_id'];

    public function sender(){
        return $this->belongsTo(User::class,'user_sender_id');
    }

    public function receiver(){
        return $this->belongsTo(User::class,'user_receiver_id');
    }
}
