@extends('layouts.app')
@section('content')

    <h1>list sate</h1>
    <div class="row">
        <div class="col-md-4 pull-right">
            <a class="btn btn-primary" href="{{ route('users.create')  }}">Ajouter</a>
        </div>
    </div>
    @forelse($users as $user)
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1>{{ $user->first_name  }}</h1>
                <p><a class="btn bg-primary" href="{{ route('users.edit', $user->id)  }}"> Edit</a></p>
                {{Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id]])}}
                {!! Form::submit('delete', ['class' => 'btn bg-primary']) !!}
                {{Form::close()}}
            </div>
        </div>
    @empty
        <h2>no state</h2>
    @endforelse
    @if(count($users))
    {{ $users->links()  }}
    {{ $users->perPage() * $users->currentPage() }} users  of {{$users->total()}}
    @endif
@endsection

