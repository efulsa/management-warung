<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function print(){
        $no = 1;
        if(Auth::user()->role == 'admin'){
            $user = User::where('role','=','customer')->orderBy('name','asc')->get();
            return view('home', compact('user','no'));
        }else{
            $borrow = Transaction::where('user_id','=', Auth::user()->id)->orderBy('created_at','desc')->get();
            return view('home', compact('borrow','no'));
        }
    }
}
