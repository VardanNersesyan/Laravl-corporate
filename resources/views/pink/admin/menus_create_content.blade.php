<div id="content-page" class="content group">
    <div class="hentry group">

        {!! Form::open(['url' => (isset($menu->id)) ? route('admin.menus.update',['menus'=>$menu->id]) : route('admin.menus.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

        <ul>

            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Title:</span>
                    <br />
                    <span class="sublabel">Item title</span><br />
                </label>
                <div class="input-prepend">
                    {!! Form::text('title',isset($menu->title) ? $menu->title  : old('title'), ['placeholder'=>'Enter page title']) !!}
                </div>
            </li>


            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Parent menu partition:</span>
                    <br />
                    <span class="sublabel">Parent:</span><br />
                </label>
                <div class="input-prepend">
                    {!! Form::select('parent', $menus, isset($menu->parent) ? $menu->parent : null) !!}
                </div>

            </li>
        </ul>

        <h1>Menu type:</h1>

        <div id="accordion">

            <h3>{!! Form::radio('type', 'customLink',(isset($type) && $type == 'customLink') ? TRUE : FALSE,['class' => 'radioMenu', 'checked'=>'checked']) !!}
                <span class="label">Manual link:</span></h3>

            <ul>

                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Path for reference:</span>
                        <br />
                        <span class="sublabel">Path for reference</span><br />
                    </label>
                    <div class="input-prepend">
                        {!! Form::text('custom_link',(isset($menu->path) && $type=='customLink') ? $menu->path  : old('custom_link'), ['placeholder'=>'Enter page title']) !!}
                    </div>
                </li>
                <div style="clear: both;"></div>
            </ul>


            <h3>{!! Form::radio('type', 'blogLink',(isset($type) && $type == 'blogLink') ? TRUE : FALSE,['class' => 'radioMenu']) !!}
                <span class="label">Section Blog:</span></h3>

            <ul>

                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Link to the blog category:</span>
                        <br />
                        <span class="sublabel">Link to the blog category</span><br />
                    </label>
                    <div class="input-prepend">

                        @if($categories)
                            {!! Form::select('category_alias',$categories,(isset($option) && $option) ? $option :FALSE) !!}
                        @endif
                    </div>
                </li>


                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Link to blog material:</span>
                        <br />
                        <span class="sublabel">Link to blog material</span><br />
                    </label>
                    <div class="input-prepend">
                        {!! Form::select('article_alias', $articles, (isset($option) && $option) ? $option :FALSE, ['placeholder' => 'Not used']) !!}

                    </div>

                </li>
                <div style="clear: both;"></div>
            </ul>



            <h3>{!! Form::radio('type', 'portfolioLink',(isset($type) && $type == 'portfolioLink') ? TRUE : FALSE,['class' => 'radioMenu']) !!}
                <span class="label">Portfolio section:</span></h3>

            <ul>

                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Link to portfolio entry:</span>
                        <br />
                        <span class="sublabel">Link to portfolio entry</span><br />
                    </label>
                    <div class="input-prepend">
                        {!! Form::select('portfolio_alias', $portfolios, (isset($option) && $option) ? $option :FALSE, ['placeholder' => 'Not used']) !!}

                    </div>

                </li>

                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Portfolio:</span>
                        <br />
                        <span class="sublabel">Portfolio</span><br />
                    </label>
                    <div class="input-prepend">
                        {!! Form::select('filter_alias', $filters, (isset($option) && $option) ? $option :FALSE, ['placeholder' => 'Not used']) !!}

                    </div>

                </li>


            </ul>



        </div>

        <br />

        @if(isset($menu->id))
            <input type="hidden" name="_method" value="PUT">

        @endif
        <ul>
            <li class="submit-button">
                {!! Form::button('Save', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}
            </li>
        </ul>







        {!! Form::close() !!}


    </div>
</div>

<script>
    jQuery(function ($) {
        $('#accordion').accordion({
            activate: function (e, obj) {
                obj.newPanel.prev().find('input[type=radio]').attr('checked','checked');
            }
        });
    })
</script>