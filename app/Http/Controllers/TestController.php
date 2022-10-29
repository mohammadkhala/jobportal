<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\customer;
use App\Models\Test;
use Illuminate\Http\Request;
use Exception;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = Test::latest()->paginate(15);
        return view('admin.test.index', compact('test'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestRequest $request)
    {
        try {


            $appoin = Test::create([
                'p_id' => $request->p_id,
                'description' => $request->description,
                'info_mid' => $request->info_mid
            ]);
            return redirect()->back()->with('success', 'تم اضافة فحص جديد');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'حدث خطأ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminTest  $adminTest
     * @return \Illuminate\Http\Response
     */
    public function show(Test $adminTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminTest  $adminTest
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $test, $id)
    {
        try {
            $test = Test::find($id);
            if ($test)
                return view('admin.test.edit', compact('test'));
        } catch (Exception $ex) {
            return $ex;
            return redirect()->route('admin.test')->with(['error' => 'هذا الفحص غير موجود ']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminTest  $adminTest
     * @return \Illuminate\Http\Response
     */
    public function update(TestRequest $request, Test $adminTest,$id)
    {
        $appoin = Test::find($id)->first();
        if(customer::where('personal_id', $request->p_id)->first()){
            $appoin->update([
                'p_id' => $request->p_id,
                'description' => $request->description,
                'mid_info' => $request->mid_info
            ]);
            return redirect()->route('admin.test')->with(['success' => 'تم ألتحديث بنجاح']);
        }
        return redirect()->route('admin.test')->with(['error' => 'هذا الفحص غير موجود ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminTest  $adminTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test,$id)
    {
        if (!$test)
        return redirect()->route('admin.test')->with(['error' => 'هذا المريض غير موجود ']);
        $appointment=Test::findOrFail($id);
        $appointment->delete();
        return redirect()->route('admin.test')->with('message','تم الحذف بنجاح');
    }
}
