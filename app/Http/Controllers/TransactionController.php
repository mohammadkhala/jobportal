<?php

namespace App\Http\Controllers;

use App\Models\Finance;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('admin.transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'finance_id' => "required|exists:finances,id",
            'payment' => "required|integer",
            'date' => "required|date",

        ]);
        $transactions = Transaction::create([
            'finance_id' => Finance::findOrFail($request->id)->id,
            'payment' => $request->payment,
            'date' => $request->date,
            'note' => $request->note
        ]);
        return redirect()->back()->with('success', 'تم اضافة دفعة جديدة بنجاح');
    }

    public function show(Transaction $financeTransition)
    {
        //
    }


    public function edit(Transaction $financeTransition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FinanceTransition  $financeTransition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $financeTransition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FinanceTransition  $financeTransition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Finance::findOrFail($id);
        $transaction->delete();
        return redirect()->route('admin.finance')->with('message', 'تم الحذف بنجاح');
    }
}
