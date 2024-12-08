<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Community extends Model
{
    /** @use HasFactory<\Database\Factories\CommunityFactory> */
    use HasFactory;

    protected $table = 'communities';

    protected $fillable = ['administrator_id','name'];

    public function administrator(){
        return $this->belongsTo(User::class,'administrator_id');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'community_user', 'community_id', 'user_id','id','id');
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

}
