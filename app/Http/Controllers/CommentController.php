<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Film;
use Auth;
class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $liste= Film::all();
        return view('user.films',['films'=>$liste]);
    }
    public function store(Request $request)
    {
        $comment=new Comment();
        $comment->commentaire=$request->input('comment');
        $comment->film_id=$request->input('id');
        $comment->user_id=Auth::user()->id;
        $comment->save();
        return redirect()->route('users.show',$request->input('id'));
    }
    public function show($id)
    {
        $film=Film :: find($id);
        // $comments= Comment::all();
        // $comments=Comment::$this->where('film_id',$id);
        $comments = Comment::where('film_id','=',$id)->get();

        return view('user.filmdetails',['film'=>$film,'comments'=>$comments]);
    }


    public function update(Request $request, $id)
    {
        $com=Comment::find($id);
        $com->commentaire=$request->input('comment');
        $com->save();

        return redirect()->route('users.show',$request->input('idf'));

    }


    public function destroy(Request $request,$id)
    {
        $com=Comment::find($id);

        $com->delete();
        return redirect()->route('users.show',$request->input('idf'));
    }

}
