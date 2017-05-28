@extends('layouts.app')
@section('content')

    <h1>list sate</h1>
    <div class="row">
        <div class="col-md-4 pull-right">
            <a class="btn btn-primary" href="{{ route('states.create')  }}">Ajouter</a>
        </div>
    </div>
    @forelse($states as $state)
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1>{{ $state->name  }}</h1>
                <p><a class="btn bg-primary" href="{{ route('states.edit', $state->id)  }}"> Edit</a></p>
                {{Form::open(['method' => 'DELETE', 'route' => ['states.destroy', $state->id]]) }}
                {!! Form::submit('delete', ['class' => 'btn bg-primary']) !!}
                {{Form::close()}}
            </div>
        </div>
    @empty
        <h2>no state</h2>
    @endforelse
    @if(count($states))
    {{ $states->links()  }}

    {{ $states->perPage() * $states->currentPage() }} states  of {{$states->total()}}
    @endif
@endsection

