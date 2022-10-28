<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::latest()->paginate(15);
        return view('customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        try {
            $customer = Customer::create($request->all());
            return redirect()->back()->with('success', 'تم اضافة مريض جديد');
            DB::commit();

        } catch (Exception $ex) {
            return $ex;
            DB::rollback();

            return redirect()->back()->with('error', 'حدث خطأ يرجى اعادة المحاول');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     try{ $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
     }catch(Exception $ex){

        return $this->$ex;
     }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer,$id)
    {
        $customer = Customer::find($id)->first();
        if (!$customer)
        return redirect()->route('customer')->with(['error' => 'هذا المريض غير موجود ']);
        Customer::where('id', $id)
        ->update($request->except('_token','_method'));





        return redirect()->route('customer')->with(['success' => 'تم ألتحديث بنجاح']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($personal_id,Customer $customer)
    {
        if (!$customer)
        return redirect()->route('customer')->with(['error' => 'هذا المريض غير موجود ']);
        $customer=Customer::findOrFail($personal_id);
        $customer->delete();
        return redirect()->route('customer')->with('message','تم الحذف بنجاح');
    }
}
