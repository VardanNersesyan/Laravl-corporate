<div id="content-single" class="content group">
    <div class="hentry hentry-post blog-big group ">
        <!-- post featured & title -->

        @if($article)

        <div class="thumbnail">
            <!-- post title -->
            <h1 class="post-title"><a href="#">{{ $article->title }}</a></h1>
            <!-- post featured -->
            <div class="image-wrap">
                <img src="{{ asset(config('settings.THEME')) }}/images/articles/{{ $article->img->max }}" alt="" title="" />
            </div>
            <p class="date">
                <span class="month">{{$article->created_at->format('M')}}</span>
                <span class="day">{{$article->created_at->format('d')}}</span>
            </p>
        </div>
        <!-- post meta -->
        <div class="meta group">
            <p class="author"><span>by <a href="#" title="{{ $article->title }}" rel="author">{{ $article->user->name }}</a></span></p>
            <p class="categories"><span>In: <a href="{{ route('articlesCat',['cat_alias' => $article->category->alias]) }}" title="View all posts in {{ $article->category->title }}" rel="category tag">{{ $article->category->title }}</a> </span></p>
            <p class="comments"><span><a href="#comments" title="Comment on This is the title of the first article. Enjoy it.">{{ count($article->comments) ? count($article->comments) : 0 }} {{ Lang::choice(config('app.locale').'.comments', count($article->comments)) }}</a></span></p>
        </div>
        <!-- post content -->
        <div class="the-content single group">
            <p>{!! $article->text !!}</p>
            <div class="socials">
                <h2>love it, share it!</h2>
                <a href="#" class="socials-small facebook-small" title="Facebook">facebook</a>
                <a href="#" class="socials-small twitter-small" title="Twitter">twitter</a>
                <a href="#" class="socials-small google-small" title="Google">google</a>
                <a href="#" class="socials-small pinterest-small" title="Pinterest">pinterest</a>
                <a href="#" class="socials-small bookmark-small" title="This is the title of the first article. Enjoy it.">bookmark</a>
            </div>
        </div>
        <p class="tags">Tags: <a href="#" rel="tag">book</a>, <a href="#" rel="tag">css</a>, <a href="#" rel="tag">design</a>, <a href="#" rel="tag">inspiration</a></p>
        <div class="clear"></div>
    </div>
    <!-- START COMMENTS -->
    <div id="comments">
        <h3 id="comments-title">
            <span>{{ count($article->comments) }}</span> {{ Lang::choice(config('app.locale').'.comments', count($article->comments)) }}
        </h3>

        @if(count($article->comments)>0)
            @set($com,$article->comments->groupBy('parent_id'))

            <ol class="commentlist group">
                @foreach($com as $k => $comments)

                    @if($k !== 0)
                        @break
                    @endif

                    @include(config('settings.THEME').'.comment', ['items' => $comments])

                @endforeach

            </ol>
        @endif

        <!-- START TRACKBACK & PINGBACK -->
        <h2 id="trackbacks">Trackbacks and pingbacks</h2>
        <ol class="trackbacklist"></ol>
        <p><em>No trackback or pingback available for this article.</em></p>

        <!-- END TRACKBACK & PINGBACK -->
        <div id="respond">
            <h3 id="reply-title">Leave a <span>Reply</span> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a></small></h3>
            <form action="{{ route('comment.store') }}" method="post" id="commentform">
                @if(!Auth::check())
                    <p class="comment-form-author"><label for="name">Name</label> <input id="name" name="name" type="text" value="" size="30" aria-required="true" /></p>
                    <p class="comment-form-email"><label for="email">Email</label> <input id="email" name="email" type="text" value="" size="30" aria-required="true" /></p>
                    <p class="comment-form-url"><label for="site">Website</label><input id="site" name="site" type="text" value="" size="30" /></p>
                @endif
                <p class="comment-form-comment"><label for="text">Your comment</label><textarea id="text" name="text" cols="45" rows="8"></textarea></p>
                <div class="clear"></div>
                <p class="form-submit">
                    {{ csrf_field() }}
                    <input id="comment_post_ID" type="hidden" name="comment_post_ID" value="{{ $article->id }}">
                    <input id="comment_parent" type="hidden" name="comment_parent" value="0">
                    <input name="submit" type="submit" id="submit" value="Post Comment" />
                </p>
            </form>
        </div>
        <!-- #respond -->
    </div>
    <!-- END COMMENTS -->
    @endif
</div>