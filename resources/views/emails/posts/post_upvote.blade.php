@component('mail::message')
# Your post was upvoted!

{{ $upvoter->name }} upvoted one of your post!

@component('mail::button', ['url' => route('posts.show', $post)])
View post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
