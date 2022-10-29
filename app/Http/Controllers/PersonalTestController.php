<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalTestRequest;
use App\Models\PersonalTest;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function store(PersonalTestRequest $request)
    {
        try {
            if ($request->hasFile('report')) {
                $file = $request->file('report');
                $time = Carbon::now();
                $directory = date_format($time, 'Y') . '/' . date_format($time, 'm');
                $fileName = date_format($time, 'h') . rand(1, 9) . date_format($time, 's') . '.' . $file->extension();
                Storage::disk('public')->putFileAs($directory, $file, $fileName);
                $report = PersonalTest::create([

                    'report' => $directory . '/' . $fileName,
                ]);
            }

            if ($request->hasFile('attach')) {
                $file = $request->file('attach');
                $time = Carbon::now();
                $directory = date_format($time, 'Y') . '/' . date_format($time, 'm');
                $fileName = date_format($time, 'h') . rand(1, 9) . date_format($time, 's') . '.' . $file->extension();
                Storage::disk('public')->putFileAs($directory, $file, $fileName);
                $report = PersonalTest::create([

                    'attach' => $directory . '/' . $fileName,
                ]);
            }

            $ptest = PersonalTest::create($request, [
                'p_id' => $request->p_id,
                'distance' => $request->distance,
                'Right_eye_degree' => $request->Right_eye_degree,
                'left_eye_degree' => $request->left_eye_degree,
                'year' => $request->year,
                'month' => $request->month,
                'day' => $request->day,

                'cost' => $request->cost,

                'test_id' => $request->test_id,
            ]);
            return redirect()->back()->with('success', 'تم اضافة فحص جديد');
        } catch (Exception $ex) {
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
