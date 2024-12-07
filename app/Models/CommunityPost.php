<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityPost extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $table = "community_posts";

    protected $fillable = ['text','path_photo','like','user_id','community_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function community(){
        return $this->belongsTo(Community::class,'community_id');
    }

    public function comments(){
        return $this->hasMany(CommunityComment::class);
    }
}
