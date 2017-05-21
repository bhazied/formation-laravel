@extends('layouts.app')
<div class="container">
    @section('content')
        @foreach($annonces as $annonce)
            <div class="row">
                <div class="col-md-4 pull-right">
                    <a class="btn btn-primary" href="{{ route('annonces.create')  }}">Ajouter</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h1>{{ $annonce->title  }}</h1>
                    <p>{{ $annonce->description  }}</p>
                    <p><a class="btn bg-primary" href="{{ route('annonces.edit', $annonce->id)  }}"> Edit</a></p>
                </div>
            </div>
        @endforeach
    @endsection
</div>