<div id="content-page" class="content group">
    <div class="hentry group">

        {!! Form::open(['url' => (isset($portfolio->id)) ? route('admin.portfolios.update',['portfolio'=>$portfolio->alias]) : route('admin.portfolios.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

        <ul>
            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Title:</span>
                    <br />
                    <span class="sublabel">Material Title</span><br />
                </label>
                <div class="input-prepend">
                    {!! Form::text('title',isset($portfolio->title) ? $portfolio->title  : old('title'), ['placeholder'=>'Enter page title']) !!}
                </div>
            </li>

            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Customer:</span>
                    <br />
                    <span class="sublabel">Customer</span><br />
                </label>
                <div class="input-prepend">
                    {!! Form::text('customer', isset($portfolio->customer) ? $portfolio->customer : old('customer'), ['placeholder'=>'Enter customer name']) !!}
                </div>
            </li>

            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Alias:</span>
                    <br />
                    <span class="sublabel">Enter alias</span><br />
                </label>
                <div class="input-prepend">
                    {!! Form::text('alias', isset($portfolio->alias) ? $portfolio->alias  : old('alias'), ['placeholder'=>'Enter page alias']) !!}
                </div>
            </li>

            <li class="textarea-field">
                <label for="message-contact-us">
                    <span class="label">Text:</span>
                </label>
                <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
                    {!! Form::textarea('text', isset($portfolio->text) ? $portfolio->text  : old('text'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Enter the text of description']) !!}
                </div>
                <div class="msg-error"></div>
            </li>

            @if(isset($portfolio->img->path))
                <li class="textarea-field">

                    <label>
                        <span class="label">Image:</span>
                    </label>

                    {{ Html::image(asset(config('settings.THEME')).'/images/projects/'.$portfolio->img->path,'',['style'=>'width:400px']) }}
                    {!! Form::hidden('old_image',$portfolio->img->path) !!}

                </li>
            @endif


            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Image:</span>
                    <br />
                    <span class="sublabel">Material Image</span><br />
                </label>
                <div class="input-prepend">
                    {!! Form::file('image', ['class' => 'filestyle','data-buttonText'=>'Select an image','data-buttonName'=>"btn-primary",'data-placeholder'=>"No file"]) !!}
                </div>

            </li>

            @if(isset($portfolio->id))
                <input type="hidden" name="_method" value="PUT">

            @endif

            <li class="submit-button">
                {!! Form::button('Save', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}
            </li>

        </ul>





        {!! Form::close() !!}

        <script>
            CKEDITOR.replace( 'editor' );
        </script>
    </div>
</div>