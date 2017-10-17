<div id="content-page" class="content group">
    <div class="hentry group">

        {!! Form::open(['url' => (isset($user->id)) ? route('admin.users.update',['users'=>$user->id]) :route('admin.users.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

        <ul>
            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Name:</span>
                    <br />
                    <span class="sublabel">Name</span><br />
                </label>
                <div class="input-prepend">
                    {!! Form::text('name',isset($user->name) ? $user->name  : old('name'), ['placeholder'=>'Insert name']) !!}
                </div>
            </li>

            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Login:</span>
                    <br />
                    <span class="sublabel">Login</span><br />
                </label>
                <div class="input-prepend">
                    {!! Form::text('login',isset($user->login) ? $user->login  : old('login'), ['placeholder'=>'Insert login']) !!}
                </div>
            </li>

            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Email:</span>
                    <br />
                    <span class="sublabel">Email</span><br />
                </label>
                <div class="input-prepend">
                    {!! Form::text('email',isset($user->email) ? $user->email  : old('email'), ['placeholder'=>'Insert email']) !!}
                </div>
            </li>

            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Password:</span>
                    <br />
                    <span class="sublabel">Password</span><br />
                </label>
                <div class="input-prepend">
                    {!! Form::password('password') !!}
                </div>
            </li>

            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Confirm password:</span>
                    <br />
                    <span class="sublabel">Confirm password</span><br />
                </label>
                <div class="input-prepend">
                    {!! Form::password('password_confirmation') !!}
                </div>
            </li>

            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Role:</span>
                    <br />
                    <span class="sublabel">Role</span><br />
                </label>
                <div class="input-prepend">

                    {!! Form::select('role_id', $roles, (isset($user)) ? $user->roles()->first()->id : null) !!}
                </div>

            </li>





            @if(isset($user->id))
                <input type="hidden" name="_method" value="PUT">

            @endif

            <li class="submit-button">
                {!! Form::button('Save', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}
            </li>

        </ul>





        {!! Form::close() !!}

    </div>
</div>