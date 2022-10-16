<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Spatie\Permission\Models\Permission;
use DB;

class MovieController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:movie-list|movie-create|movie-edit|movie-delete', ['only' => ['index','store']]);
        $this->middleware('permission:movie-create', ['only' => ['create','store']]);
        $this->middleware('permission:movie-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:movie-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::latest()->paginate(5);
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);
    
        Movie::create($validatedData);
    
        return redirect()->route('movies.index')
                        ->with('success','Konten berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies.show',compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit',compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);
    
        $movie->update($validatedData);
    
        return redirect()->route('movies.index')
                        ->with('success','Konten berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
    
        return redirect()->route('movies.index')
                        ->with('success','Konten berhasil dihapus');
    }

    public function tampil()
    {
        $movies = Movie::latest()->paginate(5);
        return view('movies.lists', compact('movies'));
    }

    public function lihat(Movie $movie)
    {
        return view('movies.list',compact('movie'));
    }

    public function buat(Request $request, Movie $movie)
    {
        return view('movies.request');
    }
}
