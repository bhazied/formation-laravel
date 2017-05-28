@php
$options = ['class' => 'form-horizontal'];
if(!is_null($annonce->id)){
$options = array_merge(['route' => ['annonces.update', $annonce->id], 'method' => 'PUT'], $options);
}
else {
$options = array_merge(['route' => ['annonces.store', $annonce->id], 'method' => 'POST'], $options);
}
@endphp
@if($errors->has('description'))
    <span class="alert alert-danger">{{ $errors->first('description')  }}</span>
@endif
@if($errors->has('reference'))
    <span class="alert alert-danger">{{ $errors->first('reference')  }}</span>
@endif
{{ Form::model($annonce, $options) }}
<div class="form-group">
    {!! Form::label('name', 'title', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'annone name...']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', 'category', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('category_id', $categories, null ,['class' => 'form-control', 'placeholder' => 'select category']) !!}
    </div>
</div>
<div class="row">
<div class="form-group">
    {!! Form::label('name', 'reference', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('reference', null, ['class' => 'form-control', 'placeholder' => 'annone reference...']) !!}
    </div>
</div>
    </div>
<div class="form-group">
    {!! Form::label('name', 'description', ['class'=> 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'annone description...']) !!}
    </div>
    @can('update', $annonce->user)
    <div class="form-group">
        {!! Form::label('name', 'craretor user', ['class'=> 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::select('creator_user_id', $users, null ,['class' => 'form-control', 'placeholder' => 'select User']) !!}
        </div>
    </div>
    @endcan
</div>
{!! Form::submit('Add') !!}
{{ Form::close()  }}