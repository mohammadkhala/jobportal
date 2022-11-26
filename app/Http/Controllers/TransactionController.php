<?php

namespace App\Http\Controllers;

use App\Models\Finance;

use App\Models\Transaction;
use DB;
use Illuminate\Http\Request;
use Psy\Readline\Transient;

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




$allFinance= Finance::find($request->finance_id)->amount; //10.000
$allTransaction=Transaction::where('finance_id',$request->finance_id)->sum('payment'); //9900
$newTotalTransaction=$allTransaction + $request->payment;
$remining=$allFinance - $newTotalTransaction; //100


//create
$create=new Transaction();
$create->finance_id = $request->finance_id;
$create->payment = $request->payment;
$create->date = $request->date;
$create->note = $request->note;
$create->save();

//update remining
$finances=Finance::find($request->finance_id); //2
$finances->remaining = $remining;
$finances->save();



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
