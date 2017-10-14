@extends(config('settings.THEME').'.layouts.site')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('content')
    {!! $content !!}
@endsection

@section('bar')
    {!! $leftBar or ''!!}
@endsection

@section('footer')
    {!! $footer !!}
@endsection