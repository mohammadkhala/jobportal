<?php

namespace App\Http\Controllers;

use App\Models\Finance;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('admin.transaction.index', compact('transactions'));
    }

    public function create()
    {
        return view('admin.transaction.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'finance_id' => "required|exists:finances,id",
            'payment' => "required|integer",
            'date' => "required",

        ]);
        $transaction = Transaction::create([
            'finance_id'=> $request->finance_id,
            'payment' => $request->payment,
            'date' => $request->date,
            'note' => $request->note
        ]);
        return redirect()->route('admin.transaction')->with('success', 'تم اضافة دفعة جديدة بنجاح');
    }

    public function edit(Transaction $transaction)
{
    return view('admin.transaction.edit',compact('transaction'));
}

    public function update(Request $request, Transaction $transaction)
    {
        $this->validate($request, [
            'finance_id' => "required|exists:finances,id",
            'payment' => "required|integer",
            'date' => "required|date",

        ]);

        $transaction->update([
            'finance_id'=> $request->finance_id,
            'payment' => $request->payment,
            'date' => $request->date,
            'note' => $request->note
        ]);

        return redirect()->route('admin.transaction')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return redirect()->route('admin.transaction')->with('message', 'تم الحذف بنجاح');
    }
}
