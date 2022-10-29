<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalTestRequest;
use App\Models\PersonalTest;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Events\Validated;;
class PersonalTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ptest = PersonalTest::latest()->paginate(15);
        return view('admin.personaltest.index', compact('ptest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.personaltest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $this->validate($request,[
                'p_id'=>'required|exists:customers,personal_id',

                'Right_eye_degree'=>'required',
                'left_eye_degree'=>'required',
                'year'=>'required|integer|min:2000',
                'month'=>'required|integer|min:1|max:12',
                'day'=>'required|integer|min:1|max:31',
                'report' =>  'nulluble|file|mimes:csv,txt,xlx,xls,pdf|max:2048',
                'cost'=>'required|integer',
                'attach'=>'file||mimes:csv,txt,xlx,xls,pdf|max:2048',
                'test_id'=>'required|exists:test,id',
            ]);

            if ($request->file('report')) {
                $file = $request->file('report');
                $time = Carbon::now();
                $directory = date_format($time, 'Y') . '/' . date_format($time, 'm');
                $fileName = date_format($time, 'h') . rand(1, 9) . date_format($time, 's') . '.' . $file->extension();
                Storage::disk('public')->putFileAs($directory, $file, $fileName);
                $report = PersonalTest::create([

                    'report' => $directory . '/' . $fileName,
                ]);
            }

            if ($request->file('attach')) {
                $file = $request->file('attach');
                $time = Carbon::now();
                $directory = date_format($time, 'Y') . '/' . date_format($time, 'm');
                $fileName = date_format($time, 'h') . rand(1, 9) . date_format($time, 's') . '.' . $file->extension();
                Storage::disk('public')->putFileAs($directory, $file, $fileName);
                $report = PersonalTest::create([

                    'attach' => $directory . '/' . $fileName,
                ]);
            }

            // $ptest = PersonalTest::create($request->except('_token') );

            if(PersonalTest::create($request->validated())){

            return redirect()->back()->with('success', 'تم اضافة فحص جديد');}
        } catch (Exception $ex) {
return $ex;
            return redirect()->back()->with('error', 'المريض غير موجود يرجى اضافته');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerTest  $customerTest
     * @return \Illuminate\Http\Response
     */
    public function show(PersonalTest $customerTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerTest  $customerTest
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonalTest $customerTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerTest  $customerTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonalTest $customerTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerTest  $customerTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonalTest $customerTest)
    {
        //
    }
}
