
    <div class="widget-first widget recent-posts">
        <h3>{{ Lang::get(config('app.locale').'.latest_projects') }}</h3>
        <div class="recent-post group">
            @if(!$portfolios->isEmpty())
                @foreach($portfolios as $portfolio)
                    <div class="hentry-post group">
                        <div class="thumb-img"><img width="55" src="{{ asset(config('settings.THEME')) }}/images/projects/{{ $portfolio->img->mini }}" alt="" title="" /></div>
                        <div class="text">
                            <a href="{{ route('portfolios.show',['alias'=>$portfolio->alias]) }}" title="{{ $portfolio->title }}" class="title">{{ $portfolio->title }}</a>
                            <p>{{ str_limit($portfolio->text,130) }}</p>
                            <a class="read-more" href="{{ route('portfolios.show',['alias'=>$portfolio->alias]) }}">&rarr; {{ Lang::get(config('app.locale').'.read_more') }}</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    @if(!$comments->isEmpty())
        <div class="widget-last widget recent-comments">
            <h3>{{ Lang::get(config('app.locale').'.recent_comments') }}</h3>

            <div class="recent-post recent-comments group">
                @foreach($comments as $comment)
                    <div class="the-post group">
                        <div class="avatar">
                            @set($hash, ($comment->email) ? md5(strtolower($comment->email)) : md5(strtolower($comment->user->email)))
                            <img alt="" src="https://www.gravatar.com/avatar/{{ $hash }}?d=mm&s=55" class="avatar" />
                        </div>
                        <span class="author"><strong><h3 style="display: inline">{{ isset($comment->user) ? $comment->user->name : $comment->name }}</h3></strong> in</span>
                        <a class="title" href="{{ route('articles.show',['alias'=>$comment->article->alias]) }}">{{ $comment->article->title }}</a>
                        <p class="comment">
                            {{ str_limit($comment->text,130) }} <a class="goto" href="{{ route('articles.show',['alias'=>$comment->article->alias]) }}">&#187;</a>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


{{--            <div class="the-post group">
                <div class="avatar">
                    <img alt="" src="images/avatar/unknow55.png" class="avatar" />
                </div>
                <span class="author"><strong><a href="mailto:no-email@i-am-anonymous.not">eduard</a></strong> in</span>
                <a class="title" href="article.html">Nice &amp; Clean. The best for your blog!</a>
                <p class="comment">
                    hi <a class="goto" href="article.html">&#187;</a>
                </p>
            </div>

            <div class="the-post group">
                <div class="avatar">
                    <img alt="" src="images/avatar/nicola55.jpeg" class="avatar" />
                </div>
                <span class="author"><strong><a href="mailto:nicola@yopmail.com">nicola</a></strong> in</span>
                <a class="title" href="article.html">This is the title of the first article. Enjoy it.</a>
                <p class="comment">
                    While i’m the author of the post. My comment template is different,... <a class="goto" href="article.html">&#187;</a>
                </p>
            </div>

            <div class="the-post group">
                <div class="avatar">
                    <img alt="" src="images/avatar/unknow55.png" class="avatar" />
                </div>
                <span class="author"><strong><a href="mailto:no-email@i-am-anonymous.not">Anonymous</a></strong> in</span>
                <a class="title" href="article.html">This is the title of the first article. Enjoy it.</a>
                <p class="comment">
                    Hi all, i’m a guest and this is the guest’s awesome comments... <a class="goto" href="article.html">&#187;</a>
                </p>
            </div>
        </div>
    </div>--}}

