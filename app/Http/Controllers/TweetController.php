<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tweets =auth()->user()->tweets;
        return view('tweets.index', ['tweets'=> $tweets]);
       
       /* $tweets= Tweet::all();

         return view('welcome', compact('tweets'));
    */}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('tweets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  /* $user=Auth::user();
        $user->tweets()->create(['body'=>$request->input('body'),]);*/
        $data = $request->all();
        Tweet::create($data);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {
        $tweet = Tweet::find($tweet-> id);
        return view('tweets.show', ['tweet'=> $tweet]);
    }
    // ...
    public function edit(Tweet $tweet)
    {
      return view('tweets.edit', ['tweet'=> $tweet]);
    }
    public function update(Request $request, Tweet $tweet)
    {
       $data = $request-> all();
        $tweet->update($data);

        return redirect('/');
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->delete();

        return redirect('/');
    }

    // ...
}