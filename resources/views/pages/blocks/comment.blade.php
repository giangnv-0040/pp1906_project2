<!-- Comments -->
<ul class="comments-list">
    @foreach ($post->comments as $comment)
        @include('pages.blocks.a_comment')
    @endforeach
</ul>
