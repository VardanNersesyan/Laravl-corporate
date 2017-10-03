<div id="content-blog" class="content group">
    @if($articles)

     @foreach($articles as $article)
            <div class="sticky hentry hentry-post blog-big group">
                <!-- post featured & title -->
                <div class="thumbnail">
                    <!-- post title -->
                    <h2 class="post-title"><a href="{{ route('articles.show',['alias' => $article->alias]) }}">{{ $article->title }}</a></h2>
                    <!-- post featured -->
                    <div class="image-wrap">
                        <img src="{{ asset(config('settings.THEME')) }}/images/articles/{{ $article->img->max }}" alt="" title="" />
                    </div>
                    <p class="date">
                        <span class="month">{{ isset($article->created_at) ? $article->created_at->format('M') : 'NO' }}</span>
                        <span class="day">{{ isset($article->created_at) ? $article->created_at->format('d') : 'NO' }}</span>
                    </p>
                </div>
                <!-- post meta -->
                <div class="meta group">
                    <p class="author"><span>by <a href="#" title="Posts by {{ $article->user->name }}" rel="author">{{ $article->user->name }}</a></span></p>
                    <p class="categories"><span>In: <a href="{{ route('articlesCat',['cat_alias' => $article->category->alias]) }}" title="View all posts in {{ $article->category->title }}" rel="category tag">{{ $article->category->title }}</a></span></p>
                    <p class="comments"><span><a href="{{ route('articles.show',['alias' => $article->alias]) }}#respond" title="Comment on Section shortcodes &amp; sticky posts!">{{ isset($article->comments) ? count($article->comments) : 0 }} {{ Lang::choice(config('app.locale').'.comments', count($article->comments)) }}</a></span></p>
                </div>
                <!-- post content -->
                <div class="the-content group">
                    {!! $article->desc !!}
                    <p><a href="{{ route('articles.show',['alias'=>$article->alias]) }}" class="btn   btn-beetle-bus-goes-jamba-juice-4 btn-more-link">→ {{Lang::get(config('app.locale').'.read_more')}}</a></p>
                </div>
                <div class="clear"></div>
            </div>
     @endforeach

    <div class="general-pagination group">
        @if($articles->lastPage() > 1)
            @if($articles->currentPage() !== 1)
                <a href="{{ $articles->previousPageUrl() }}">{{ Lang::get('pagination.previous' ) }}</a>
            @endif

            @for($i = 1; $i <= $articles->lastPage(); $i++)
                @if($articles->currentPage() == $i)
                    <a class="selected disabled">{{ $i }}</a>
                @else
                    <a href="{{ $articles->url($i) }}">{{ $i }}</a>
                @endif
            @endfor

            @if($articles->currentPage() !== $articles->lastPage())
                <a href="{{ $articles->nextPageUrl() }}">{{ Lang::get('pagination.next' ) }}</a>
            @endif
        @endif
    </div>

    @else
        <h1>{{ Lang::get(config('app.locale').'.articles_no') }}</h1>
    @endif
</div>