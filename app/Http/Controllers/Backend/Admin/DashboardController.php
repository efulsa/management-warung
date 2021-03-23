<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Gate::allows('admins'))
            return $next($request);
            abort(403);
        });
    }
    public function dashboard(){
        $user = User::where('role', '=', 'customer')->count();
        $total = Transaction::orderBy('created_at', 'desc')->first();
        return view('backends.admins.dashboard', compact('user', 'total'));
    }
    public function print(){
        $no = 1;
        $user = User::where('role','=','customer')->orderBy('name','asc')->get();
        $pdf = \PDF::loadView('backends.admins.print', compact('user','no'));
        return $pdf->stream();
    }
}
