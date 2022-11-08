<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Customer;
use App\Models\Test;

use App\Models\PersonalTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PersonalTestRequest;
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
        $ptests = PersonalTest::all();
        return view('admin.personaltest.index', compact('ptests'));
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


    public function store(Request $request)
    {
        $this->validate($request,[
            'personal_id'=>'required|exists:customers,personal_id',
            'distance'=>'required|string',
            'right_eye_degree'=>'required|string',
            'left_eye_degree'=>'required|string',
            'date'=>'required|date',
            // 'report' =>  'required_without:rid|file|mimes:csv,txt,xlx,xls,pdf|max:2048',
            'cost'=>'required|integer',
            // 'attach'=>'required_without:aid|file||mimes:csv,txt,xlx,xls,pdf|max:2048',
            'test_id'=>'required|exists:tests,id',
        ]);

        $reportPath = null;
        if($request->hasFile('report')) {
            $reportPath = $request->file('report')->storeAs(
                'reports',
                date_format(Carbon::now(),'Ymd'). '_' . $request->personal_id . '_' . $request->test_id . '.' . $request->file('report')->getClientOriginalExtension(),
                'public'
            );
        }

        // return $reportPath;

        $attachPath = null;
        if($request->hasFile('attach')) {
            $attachPath = $request->file('attach')->storeAs(
                'attachs',
                date_format(Carbon::now(),'Ymd'). '_' . $request->personal_id . '_' . $request->test_id . '.' . $request->file('attach')->getClientOriginalExtension(),
                'public'
            );




        $ptest = PersonalTest::create([
            'customer_id' => Customer::where('personal_id', $request->personal_id)->first()->id,
            'distance' => $request->distance,
            'right_eye_degree' => $request->right_eye_degree,
            'left_eye_degree' => $request->left_eye_degree,
            'date' => $request->date,
            'report' => $reportPath,
            'cost' => $request->cost,
            'attach' => $attachPath,
            'test_id' => $request->test_id,
        ]);

        return redirect()-> route('admin.ptest')->with('success', 'تم اضافة فحص جديد');



    }}



    public function edit($id)
    {
        $ptest = PersonalTest::find($id);
        // return $ptest;
        return view('admin.personaltest.edit', compact('ptest'));
    }


    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'personal_id'=>'required|exists:customers,personal_id',
                'distance'=>'required|string',
                'right_eye_degree'=>'required|string',
                'left_eye_degree'=>'required|string',
                'date'=>'required|date',
                // 'report' =>  'required_without:rid|file|mimes:csv,txt,xlx,xls,pdf|max:2048',
                'cost'=>'required|integer',
                // 'attach'=>'required_without:aid|file||mimes:csv,txt,xlx,xls,pdf|max:2048',
                'test_id'=>'required|exists:tests,id',
            ]);
            $reportPath = null;
            if($request->hasFile('report')) {
                $reportPath = $request->file('report')->storeAs(
                    'reports',
                    date_format(Carbon::now(),'Ymd'). '_' . $request->personal_id . '_' . $request->test_id . '.' . $request->file('report')->getClientOriginalExtension(),
                    'public'
                );
            }
            // $ptest->update([
            //     'report' => $request->report,
            // ]);
            $attachPath = null;
            if($request->hasFile('attach')) {
                $attachPath = $request->file('attach')->storeAs(
                    'attachs',
                    date_format(Carbon::now(),'Ymd'). '_' . $request->personal_id . '_' . $request->test_id . '.' . $request->file('attach')->getClientOriginalExtension(),
                    'public'
                );
            }
            $ptest = PersonalTest::findOrFail($id);
            $ptest->update([
                'customer_id' => $ptest->customer->id,
                'distance' => $request->distance,
                'right_eye_degree' => $request->right_eye_degree,
                'left_eye_degree' => $request->left_eye_degree,
                'date' => $request->date,
                'report' => $reportPath,
                'cost' => $request->cost,
                'attach' => $attachPath,
                'test_id' => $ptest->test_id,
                ]);

                // $ptest->update([
                //     'attach'=>   $request->attach,
                // ]);

            return redirect()->route('admin.ptest')->with(['success' => 'تم ألتحديث بنجاح']);
        }catch(Exception $ex){
            return redirect()->route('admin.ptest')->with(['error' => 'هذا الموعد غير موجود ']);
        }
    }

    public function destroy($id)
    {
        $ptest=PersonalTest::findOrFail($id);
        $ptest->delete();
        return redirect()->route('admin.ptest')->with('message','تم الحذف بنجاح');
    }

}
