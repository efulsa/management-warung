<?php

use App\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $borrow = new Transaction();
        $borrow->user_id = 1;
        $borrow->debit = 1000;
        $borrow->credit = 2000;
        $borrow->saldo = 2000;
        $borrow->total = 4000;
        $borrow->save();
    }
}
