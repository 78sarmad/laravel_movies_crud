@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> {{ $movie->name }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('movies.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Genre:</strong>
            {{ $movie->genre }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Directed By:</strong>
            {{ $movie->directed_by }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Release Date:</strong>
            {{ $movie->release_date }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date Created:</strong>
            {{ date_format($movie->created_at, 'jS M Y') }}
        </div>
    </div>
</div>
@endsection