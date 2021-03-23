<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Gate::allows('customers'))
            return $next($request);
            abort(403);
        });
    }

    public function index(){
        return view('backends.users.transactions.index');
    }
}
