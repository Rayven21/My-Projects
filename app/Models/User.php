<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function upvotes()
    {
        return $this->hasMany(Upvote::class);
    }

    public function receivedUpvotes()
    {
        return $this->hasManyThrough(Upvote::class, Post::class);
    }

    public function downvotes()
    {
        return $this->hasMany(Downvote::class);
    }

    public function receivedDownvotes()
    {
        return $this->hasManyThrough(Downvote::class, Post::class);
    }

    public function getKarma() { 
        return $this->receivedUpvotes()->count() - $this->receivedDownvotes()->count(); 
    }
}
