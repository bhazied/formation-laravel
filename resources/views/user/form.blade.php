@php
$options = ['class' => 'form-horizontal'];
if(!is_null($user->id)){
$options = array_merge(['route' => ['users.update', $user->id], 'method' => 'PUT'], $options);
}
else {
$options = array_merge(['route' => ['users.store', $user->id], 'method' => 'POST'], $options);
}
@endphp
@if($errors->any())

    <ul>
        @foreach($errors->all() as $field => $error)
            <li>{{ $field }} : {{ $error }}</li>
        @endforeach
    </ul>
@endif
{{ Form::model($user, $options) }}
<div class="form-group">
    {!! Form::label('name', 'last name', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'last name...']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', 'first name', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'first name...']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('name', 'username', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'username...']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('name', 'role', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('roles[]', $roles, null ,['class' => 'form-control', 'multiple' => true]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('name', 'email', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'email...']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('name', 'Mobile', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'mobile...']) !!}
    </div>
</div>
@if(is_null($user->id))
<div class="form-group">
    {!! Form::label('name', 'Password', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('password', null, ['class' => 'form-control']) !!}
    </div>
</div>
@endif
{!! Form::submit('Add') !!}
{{ Form::close()  }}