@if($portfolios)
    <div id="content-page" class="content group">
        <div class="hentry group">
            <h2>Portfolios</h2>
            <div class="short-table white">
                <table style="width: 100%" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th class="align-left">ID</th>
                        <th>Title</th>
                        <th>Text</th>
                        <th>Customer</th>
                        <th>Alias</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($portfolios as $portfolio)
                        <tr>
                            <td class="align-left">{{$portfolio->id}}</td>
                            <td class="align-left">{!! Html::link(route('admin.portfolios.edit',['portfolios'=>$portfolio->alias]),$portfolio->title) !!}</td>
                            <td class="align-left">{{str_limit($portfolio->text,200)}}</td>
                            <td>{{$portfolio->customer}}</td>
                            <td>{{$portfolio->alias}}</td>
                            <td>
                            @if(isset($portfolio->img->mini))
                                {!! Html::image(asset(env('THEME')).'/images/projects/'.$portfolio->img->mini) !!}
                                @endif
                            </td>
                            <td>
                                {!! Form::open(['url' => route('admin.portfolios.destroy',['portfolios'=>$portfolio->alias]),'class'=>'form-horizontal','method'=>'POST']) !!}
                                {{ method_field('DELETE') }}
                                {!! Form::button('Delete', ['class' => 'btn btn-french-5','type'=>'submit']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {!! Html::link(route('admin.portfolios.create'),'Add project to portfolio',['class' => 'btn btn-the-salmon-dance-3']) !!}


        </div>
        <!-- START COMMENTS -->
        <div id="comments">
        </div>
        <!-- END COMMENTS -->
    </div>
@endif