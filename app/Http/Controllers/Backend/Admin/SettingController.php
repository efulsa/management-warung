<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Gate::allows('admins'))
            return $next($request);
            abort(403);
        });
    }
    public function edit(){
        return view('backends.admins.settings.edit');
    }
    public function update(Request $request){
        $admin = User::findOrFail($request->id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->update();

        return response()->json([
            'name' => $request->name,
            'email' => $request->email
        ]);
    }
}
