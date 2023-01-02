<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(15);
        return view('admin.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function checkId()
    {
        return view('admin.customer.checkid');
    }

    public function checkidAction(Request $request){
        $customer = Customer::where('personal_id', $request->personal_id)->select('personal_id')-> get();

        if ($customer->count() > 0) {

            return redirect()->back()->with(['error', 'patient already exist']);

        } else {

            return view('admin.customer.create',['personal_id'=> $request->personal_id]);
        }
    }

    public function store(CustomerRequest $request)
    {
        try {
            $request->validate([
                'personal_id' => 'required',
                'name' => 'required',
                'start_date' => 'required|date',
                'gender' => 'required',
                'clinic' => 'required|string',

            ]);
            $customer = Customer::create([
                'personal_id' => $request->personal_id,
                'name' => $request->name,
                'start_date' => $request->start_date,
                'phone' => $request->phone,
                'address' => $request->address,
                'note' => $request->note,
                'clinic' => $request->clinic,
                'gender' => $request->gender,
            ]);
            return redirect()->back()->with('success', 'تم اضافة مريض جديد');
        } catch (\Throwable$th) {
            return $th;
            return redirect()->back()->with('error', 'حدث خطأ يرجى اعادة المحاول');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customers, $id)
    {
        try {

            $customers = Customer::find($id);
            $customers->load('appointments', 'finance', 'personalTests', 'test')->findOrFail($id);
            //dd($customer);
            return view('admin.customer.profile', compact('customers'));
        } catch (Exception $ex) {
            return $ex;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $customer = Customer::find($id);
        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer, $id)
    {
        Customer::find($id)->update($request->except('_token', '_method'));
        return redirect()->route('admin.customer')->with(['success' => 'تم ألتحديث بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, customer $customer)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();
            return redirect()->route('admin.customer')->with('message', 'تم الحذف بنجاح');
        } catch (Exception $ex) {
            return redirect()->route('admin.customer')->with('error', 'يحب حذف باقي المعلومات اولا');
        }
    }
}
