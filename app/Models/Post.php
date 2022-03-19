<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'category',
        'filename',
        'approval',
    ];

    public function upvotedBy(User $user)
    {
        return $this->upvotes->contains('user_id', $user->id);
    }

    public function downvotedBy(User $user)
    {
        return $this->downvotes->contains('user_id', $user->id);
    }

    public function user()
    {
        return $this -> belongsTo(User::class);
    }

    public function upvotes()
    {
        return $this-> hasMany(Upvote::class);
    }

    public function downvotes()
    {
        return $this-> hasMany(Downvote::class);
    }

    public function getNetVote()
    {
        return $this->upvotes->count() - $this->downvotes()->count();
    }
}
