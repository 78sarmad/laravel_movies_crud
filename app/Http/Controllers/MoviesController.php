<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::latest()->paginate(5);

        return view('movies.index', compact('movies'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'genre' => 'required',
            'directed_by' => 'required',
            'release_year' => 'required'
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.index')
            ->with('success', 'Movie created successfully.');
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'name' => 'required',
            'genre' => 'required',
            'directed_by' => 'required',
            'release_year' => 'required'
        ]);
        $movie->update($request->all());

        return redirect()->route('movies.index')
            ->with('success', 'Movie updated successfully.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')
            ->with('success', 'Movie deleted successfully.');
    }
}
