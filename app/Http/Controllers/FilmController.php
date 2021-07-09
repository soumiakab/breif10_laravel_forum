<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Film;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->role=="admin") {
            $liste= Film::all();
            return view('admin.mesFilm',['films'=>$liste]);
        }
        else{
            return view('admin.acces');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role=="admin") {

        return view('admin.ajouterFilm');
        }
        else{
            return view('admin.acces');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->role=="admin") {
            $film=new Film();
            $film->titre=$request->input('titre');
            $image = $request->file('poster');

            $new_name = rand() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('source\images'), $new_name);
            $film->poster="../source/images/".$new_name;
            $film->dateSortie=$request->input('dates');
            $film->admin_id=1;
            $film->save();
            return redirect('admin/films');
        }
        else{
            return view('admin.acces');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $film=Film :: find($id);
        $comments = Comment::where('film_id','=',$id)->get();

        return view('admin.details',['film'=>$film,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->role=="admin") {
        $film=Film :: find($id);

        return view('admin.modifier',['film'=>$film]);
        }
        else{
            return view('admin.acces');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->role=="admin") {
        $film=Film :: find($id);
        $film->titre=$request->input('titre');

        $image = $request->file('poster');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('source\images'), $new_name);
        $film->poster=$request->file('poster');



        $film->dateSortie=$request->input('dates');
        $film->admin_id=1;
        $film->save();
        return redirect('admin/films');
        }
        else{
            return view('admin.acces');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->role=="admin") {
        $film=Film::find($id);

        $film->delete();
        return redirect('admin/films');
        }
        else{
            return view('admin.acces');
        }
    }

    public function handleAdmin()
    {
        return redirect('admin/films');
    }
}
