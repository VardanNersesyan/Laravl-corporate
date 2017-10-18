@if($slider)
    <div id="content-page" class="content group">
        <div class="hentry group">
            <h2>Slider</h2>
            <div class="short-table white">
                <table style="width: 100%" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th class="align-left">ID/Edit</th>
                        <th>Title</th>
                        <th>description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($slider as $slide)
                        <tr>
                            <td class="align-left">{!! Html::link(route('admin.slider.edit',['slider'=>$slide->id]),$slide->id) !!}</td>
                            <td class="align-left">{{$slide->title}}</td>
                            <td class="align-left">{{str_limit($slide->desc,200)}}</td>
                            <td>
                                @if(isset($slide->img))
                                    {!! Html::image(asset(config('settings.THEME')).'/images/slider-cycle/'.$slide->img,'',['style'=>'width:500px']) !!}
                                @endif
                            </td>
                            <td>
                                {!! Form::open(['url' => route('admin.slider.destroy',['slider'=>$slide->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                                {{ method_field('DELETE') }}
                                {!! Form::button('Delete', ['class' => 'btn btn-french-5','type'=>'submit']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {!! Html::link(route('admin.slider.create'),'Add slide',['class' => 'btn btn-the-salmon-dance-3']) !!}


        </div>
        <!-- START COMMENTS -->
        <div id="comments">
        </div>
        <!-- END COMMENTS -->
    </div>
@endif