@if($menu)
    <div class="menu classic">
        <ul id="nav" class="menu">
            @include(config('settings.THEME').'.customMenuItems',['items'=>$menu->roots()])
        </ul>
    </div>
@endif