@php
$options = ['class' => 'form-horizontal'];
if(!is_null($state->id)){
$options = array_merge(['route' => ['states.update', $state->id], 'method' => 'PUT'], $options);
}
else {
$options = array_merge(['route' => ['states.store', $state->id], 'method' => 'POST'], $options);
}
@endphp

{{ Form::model($state, $options) }}
<div class="form-group">
    {!! Form::label('name', 'name', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'state name...']) !!}
    </div>
</div>
{!! Form::submit('Add') !!}
{{ Form::close()  }}