<div class="form-group">
    {!! Form::label('name' , 'Name' ) !!}
    {!! Form::text('name' , isset($admin) ? $admin->name : null , ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('email' , 'Email' ) !!}
    {!! Form::email('email' , isset($admin) ? $admin->email : null , ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password' , 'Password' ) !!}
    {!! Form::password('password'  , ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password_confirm' , 'Password Confirm' ) !!}
    {!! Form::password('password_confirm'  , ['class' => 'form-control']) !!}
</div>
