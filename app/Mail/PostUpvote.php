<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostUpvote extends Mailable
{
    use Queueable, SerializesModels;
    public $upvoter;
    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $upvoter, Post $post)
    {
        $this->upvoter = $upvoter;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.posts.post_upvote')
        ->subject('Someone upvoted your post!');
    }
}
