<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\User;
use DataTables;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Gate::allows('admins'))
            return $next($request);
            abort(403);
        });
    }
    public function index(){
        $user = User::where('role','=', 'customer')->orderBy('name', 'asc')->get();
        return view('backends.admins.transactions.index', compact('user'));
    }
    public function store(Request $request){
        {
            $request->validate([
                'customer_id' => 'required',
                'transaction' => 'required',
                'transaction.*' => 'required',
            ]);

            try {
                DB::beginTransaction();
                $select = $request->get('type');
                $customer_id = $request->get('customer_id');
                $getSaldo = Transaction::where('user_id','=',$customer_id)->orderBy('created_at','desc')->first();
                $getTotal = Transaction::orderBy('created_at','desc')->first();
                $transaction = array_sum(str_replace(".","",$request->get('transaction')));
                $borrow = new Transaction();
                $borrow->user_id = $customer_id;
                if($select == '1'){
                    $borrow->type = 'pinjam';
                    $borrow->credit = $transaction;
                    $borrow->debit = 0;
                    if(!empty($getSaldo->saldo)){
                        $borrow->saldo = $getSaldo->saldo + $transaction;
                    }else{
                        $borrow->saldo = 0 + $transaction;
                    }
                    if(!empty($getTotal)){
                        $borrow->total = $getTotal->total + $transaction;
                    }else{
                        $borrow->total = 0 + $transaction;
                    }
                }elseif($select == '2') {
                    if($getSaldo->saldo == 0){
                        return response()->json(['errors' => 'Tidak memiliki pinjaman']);
                    }
                    $borrow->credit = 0;
                    $borrow->type = 'bayar';
                    if(!empty($getTotal)){
                        $borrow->total = $getTotal->total - $transaction;
                        $borrow->debit = $transaction;
                    }else{
                        return response()->json(['errors' => 'Belum ada pinjaman']);
                    }
                    if($getSaldo->saldo < $transaction){
                        $borrow->debit = $getSaldo->saldo;
                        $borrow->total = $getTotal->total - $getSaldo->saldo;
                        $borrow->saldo = 0;
                    }elseif(!empty($getSaldo->saldo)){
                        $borrow->saldo = $getSaldo->saldo - $transaction;
                    }
                }else{
                    return response()->json(['errors' => 'Pilih dulu Pelanggannya']);
                }
                $borrow->save();
                DB::commit();
                $searchName = User::where('id', '=', $customer_id)->pluck('name');
                return response()->json([
                    'success' => 'Berhasil ditambakan',
                    'customer_name' => $searchName,
                    'customer_trans' => number_format($transaction)
                ]);
            }catch (Exception $e){
                DB::rollBack();
                Log::error($e->getMessage());
                abort(500);
            }
        }
    }
    public function getTrans(Request $request){
        $borrow = Transaction::where('user_id','=',$request->customer_id)->latest()->pluck('saldo');
        if(!empty($borrow->first())){
            return response()->json([
                'trans' => $borrow->first()
            ]);
        }
        return response()->json([
            'trans' => '0'
        ]);
    }
    public function dtTableTrans(Request $request){
        try {
            $borrows = Transaction::all();
            return DataTables::of($borrows)
            ->addIndexColumn()
                ->addColumn('user', function ($borrows) {
                    return $borrows->user->name;
                })
                ->editColumn('created_at', function ($borrows) {
                    return [
                        'display' => date('Y/F/d', strtotime($borrows->created_at)),
                        'timestamp' => $borrows->created_at
                    ];
                })
                ->rawColumns(['user'])
                ->make(true);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            abort(500);
        }
    }
}
