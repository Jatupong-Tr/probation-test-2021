<?php

namespace App\Http\Controllers\Api\Q1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function getTransactions()
    {
        $transactoins = Transaction::with('category')
            ->get();
       
        return response()->json([
            'transactions' => $transactoins
        ], 200);
    }

    public function createTransaction(Request $request)
    {
        $transaction = new Transaction();
        $transaction->amount = $request->input('amount');
        $transaction->note = $request->input('note');
        $transaction->category_id = $request->input('category_id');
        $transaction->save();

        return response()->json([
            'transaction' => $transaction
        ], 201);
    }

    public function updateTransaction(Request $request, int $id)
    {
        $transaction = Transaction::query()->find($id);
        if(!$transaction) {
            return response()->json([
                'message' => 'Not Found'
            ], 404);
        }
        $transaction->amount = $request->input('amount');
        $transaction->save();

        return response()->json([
            'transaction' => $transaction
        ], 200);

    }

    public function deleteTransaction(Request $request, int $id)
    {
        $transaction = Transaction::query()->find($id);
        if(!$transaction) {
            return response()->json([
                'message' => 'Not Found!'
            ], 404);
        }
        $transaction->delete();
        return response()->json([
            'transaction' => $transaction
        ], 200);
    }
}
