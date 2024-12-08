<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function communities() {
        return $this->belongsToMany(User::class, 'community_user', 'user_id', 'community_id');
    }

    public function administeredCommunities()
    {
        return $this->hasMany(Community::class, 'administrator_id', 'id');
    }

    public function sendMessages()
    {
        return $this->hasMany(Message::class, 'user_sender_id', 'id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'user_receiver_id', 'id');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function communityPosts(){
        return $this->hasMany(CommunityPost::class);
    }

    public function communityComments(){
        return $this->hasMany(CommunityComment::class);
    }

    public function userFollowing(){
        return $this->belongsToMany(User::class,'user_follower','user_followed');
    }

    public function userFollowers(){
        return $this->belongsToMany(User::class,'user_followed','user_follower');
    }
}
