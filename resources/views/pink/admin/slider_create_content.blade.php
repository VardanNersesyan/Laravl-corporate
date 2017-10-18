<div id="content-page" class="content group">
    <div class="hentry group">

        {!! Form::open(['url' => (isset($slide->id)) ? route('admin.slider.update',['slider'=>$slide->id]) : route('admin.slider.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

        <ul>

            <li class="textarea-field">
                <label for="message-contact-us">
                    <span class="label">Title:</span>
                </label>
                <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
                    {!! Form::textarea('title', isset($slide->title) ? $slide->title  : old('title'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Enter title']) !!}
                </div>
                <div class="msg-error"></div>
            </li>

            <li class="textarea-field">
                <label for="message-contact-us">
                    <span class="label">description:</span>
                </label>
                <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
                    {!! Form::textarea('desc', isset($slide->desc) ? $slide->desc  : old('desc'), ['id'=>'editor2','class' => 'form-control','placeholder'=>'Enter description']) !!}
                </div>
                <div class="msg-error"></div>
            </li>

        @if(isset($slide->img))
                <li class="textarea-field">

                    <label>
                        <span class="label">Image:</span>
                    </label>

                    {{ Html::image(asset(config('settings.THEME')).'/images/slider-cycle/'.$slide->img,'',['style'=>'width:400px']) }}
                    {!! Form::hidden('old_image',$slide->img) !!}

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

            @if(isset($slide->id))
                <input type="hidden" name="_method" value="PUT">

            @endif

            <li class="submit-button">
                {!! Form::button('Save', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}
            </li>

        </ul>





        {!! Form::close() !!}

        <script>
            CKEDITOR.replace( 'editor' );
            CKEDITOR.replace( 'editor2' );
        </script>
    </div>
</div>