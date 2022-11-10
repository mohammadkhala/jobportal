<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Test;

use App\Models\Finance;
use Illuminate\Http\Request;
use App\Models\customer;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finances = Finance::all();
        return view('admin.finance.index', compact('finances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.finance.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [

            'customer_id' => 'required|exists:customers,personal_id',
            'test_id' => 'required|exists:tests,id',
            'amount' => 'required|integer',
            'date' => 'required'
        ]);

        $finances = Finance::create([
            'customer_id' => customer::where('personal_id', $request->personal_id)->first()->id,
            'test_id' => $request->test_id,
            'date' => $request->date,
            'amount' => $request->amount,
            'remaining' =>  $request->id ,
            'note' => $request->note ,

        ]);

        return redirect()->back()->with('success', 'تم اضافة معلومات مالية جديدة');

    }




    public function edit(Finance $finance,$id)
    {
        $finance = Finance::find($id);
        return view('admin.finance.edit',compact('finance'));
    }


    public function update(Request $request,Finance $finances,$id)
    {
        $this->validate($request, [
            'customer_id' => 'required|exists:customers,personal_id',
            'test_id' => 'required|exists:tests,id',
            'amount' => 'required|integer',
            'date' => 'required'
        ]);
        $test = Test::findOrFail($request->id);

        $finances ->update([
                    'customer_id' => $finances->customer->id,
                    'test_id' => $test->id,
                    'date' => $request->date,
                   'amount'=>$request->amount,
                   'remaining'=>$request->amount-$test->payment,
                   'note'=>$request->note
                ]); dd($request);
        return redirect()->route('admin.finance')->with('success', 'تم تحديث معلومات مالية جديدة');


    }

    public function destroy($id)
    {
        $finance = Finance::findOrFail($id);
        $finance->delete();
        return redirect()->route('admin.finance')->with('message', 'تم الحذف بنجاح');
    }
}
