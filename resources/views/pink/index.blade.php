@extends(config('settings.THEME').'.layouts.site')

@section('navigation')
    {!! $navigation !!}
    @endsection

@section('slider')
    {!! $sliders !!}
    @endsection