<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Comment;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $liste= Film::all();
        return view('user.films',['films'=>$liste]);
    }
    public function handleAdmin()
    {
        return redirect('admin/films');
    }
}
