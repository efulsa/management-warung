<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Gate::allows('admins'))
            return $next($request);
            abort(403);
        });
    }
    public function index(Request $request){
        return view('backends.admins.customers.index');
    }
    public function show($id){
        $user = User::findOrFail($id);
        return response()->json([
            'name' => $user->name,
            'email' => $user->email
        ]);
    }
    public function edit($id){
        $user = User::findOrFail($id);
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ]);
    }
    public function update(Request $request){
        $validate = Validator::make($request->all(),[
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        if($validate->fails()){
            return response()->json([
                'errors' => $validate->errors()
            ]);
        }

        try {
            DB::beginTransaction();
            $user = User::findOrFail($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->update();
            DB::commit();
            return response()->json([
                'success' => 'Pelanggan berhasil diubah'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info(['message' => $e->getMessage()]);
            abort(500);
        }
    }
    public function detail($id){
        $user = User::findOrFail($id);
        return view('backends.admins.customers.detail', compact('user'));
    }
    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        if($validate->fails()){
            return response()->json([
                'errors' => $validate->errors()
            ]);
        }

    try {
    DB::beginTransaction();
        $password = Hash::make($request->password);
        $request->merge([
            'password' => $password,
            'role' => 'customer'
        ]);
        $user = $request->all();
        User::create($user);
    DB::commit();
        return response()->json([
            'success' => 'Pelanggan berhasil ditambahkan'
        ]);
    } catch (\Exception $e) {
            DB::rollBack();
            Log::info(['message' => $e->getMessage()]);
            abort(500);
    }
    }
    public function destroy(Request $request){
        User::findOrFail($request->id)->delete();
        return response()->json(['success', 'Data has been deleted']);
    }
    public function dtTableCustomer(Request $request){
        $user = User::where('role','=','customer');
        return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('borrow', function($user){
                if(!empty($borrow = $user->borrow()->first())){
                    $saldo = $borrow->saldo;
                }else{
                    $saldo = 0;
                }
                return $saldo;
            })
            ->addColumn('option', function ($user){
                $button = "<button type='button' id=' ". $user->id . " ' value='show' class='btn-sm rounded-circle show' data-toggle='tooltip' data-placement='bottom' title='Detail'><i class='fa fa-eye text-primary'></i></button>
                            <button type='button' id=' ". $user->id . " ' value='edit' class='btn-sm rounded-circle edit' data-toggle='tooltip' data-placement='bottom' title='Edit'><i class='fa fa-edit text-warning'></i></button>
                            <button type='button' onclick='deleteUser(\"". $user["id"] . "\")' value='delete' class='btn-sm rounded-circle delete' data-toggle='tooltip' data-placement='bottom' title='Hapus'><i class='fa fa-trash text-danger'></i></button>";
                return $button;
            })
            ->rawColumns(['borrow','option'])
            ->make(true);
    }
    public function dtTableDetail(Request  $request, $id){
        try {
            $borrow = Transaction::where('user_id','=', $id)->get();
            return DataTables::of($borrow)
            ->addIndexColumn()
                ->editColumn('created_at', function ($borrow) {
                    return [
                        'display' => date('y/F/d', strtotime($borrow->created_at)),
                        'timestamp' => $borrow->created_at
                    ];
                })
                ->make(true);
        }catch (\Exception $e){
            return $e;
        }
    }
}
