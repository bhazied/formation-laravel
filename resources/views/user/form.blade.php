@php
$options = ['class' => 'form-horizontal'];
if(!is_null($user->id)){
$options = array_merge(['route' => ['users.update', $user->id], 'method' => 'PUT'], $options);
}
else {
$options = array_merge(['route' => ['users.store', $user->id], 'method' => 'POST'], $options);
}
@endphp

{{ Form::model($user, $options) }}
<div class="form-group">
    {!! Form::label('name', 'last name', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'first name...']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', 'first name', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'first name...']) !!}
    </div>
</div>
{!! Form::submit('Add') !!}
{{ Form::close()  }}