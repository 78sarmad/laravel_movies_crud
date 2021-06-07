@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Movies CRUD in Laravel</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('movies.create') }}" title="Create a movie"> <i class="fas fa-plus-circle"></i>
            </a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-responsive-lg">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Genre</th>
        <th>Directed By</th>
        <th>Release Year</th>
        <th>Date Created</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($movies as $movie)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $movie->name }}</td>
        <td>{{ $movie->genre }}</td>
        <td>{{ $movie->directed_by }}</td>
        <td>{{ $movie->release_year }}</td>
        <td>{{ date_format($movie->created_at, 'jS M Y') }}</td>
        <td>
            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">

                <a href="{{ route('movies.show', $movie->id) }}" title="show">
                    <i class="fas fa-eye text-success  fa-lg"></i>
                </a>

                <a href="{{ route('movies.edit', $movie->id) }}">
                    <i class="fas fa-edit  fa-lg"></i>

                </a>

                @csrf
                @method('DELETE')

                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                    <i class="fas fa-trash fa-lg text-danger"></i>

                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $movies->links() !!}

@endsection