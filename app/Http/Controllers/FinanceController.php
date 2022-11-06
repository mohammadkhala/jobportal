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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'personal_id'=>'required|exists:customers,personal_id',
            'test_id'=>'required|exists:tests,id',
              'amount'=>'required|integer',
              'date'=>'required|date'
        ]);
        $ptest = Finance::create([
            'customer_id' => customer::where('personal_id', $request->personal_id)->first()->id,
            'test_id' => Test::where('test_id', $request->test_id)->first()->id,
            'date' => $request->date,
           'amount'=>$request->amount,
           'remaining'=>$request->amount-$request->payment,
           'note'=>$request->note
        ]);

        return redirect()->back()->with('success', 'تم اضافة معلومات مالية جديدة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function show(Finance $finance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function edit(Finance $finance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finance $finance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finance $finance)
    {
        //
    }
}
