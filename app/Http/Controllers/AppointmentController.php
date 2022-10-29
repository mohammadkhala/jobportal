<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\customer;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AppointmentRequset;
use App\Http\Requests\CustomerRequest;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appoin = Appointment::latest()->paginate(15);
        return view('appointment.index', compact('appoin'));
    }
    public function create()
    {
        return view('appointment.create');
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'p_id'=>'required|exists:customers,personal_id',
                'date'=>'required|date'

            ]);

                $appoin = Appointment::create([
                    'p_id'=>$request->p_id,
                    'date'=>$request->date,
                    'note'=>$request->note
                ]);
            return redirect()->back()->with('success', 'تم اضافة موعد جديد');
        }catch(Exception $ex){
            return redirect()->back()->with('error', 'المريض غير موجود يرجى اضافته');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {

    }
    public function edit(Appointment $appoin,$id)
    {
        try{ $appoin = Appointment::find($id);
            return view('appointment.edit', compact('appoin'));
         }catch(Exception $ex){
            return redirect()->route('appointment')->with(['error' => 'هذا الموعد غير موجود ']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(AppointmentRequset $request, Appointment $appoin,$id,CustomerRequest $customer)
    {try{
        $appoin = Appointment::find($id);
        if (!$appoin)

        return redirect()->route('appointment')->with(['error' => 'هذا الموعد غير موجود ']);
        $this->validate($request,[
            "p_id"=>$request->p_id,
            "date"=>$request->date,
            "note"=>$request->note
        ]

        );
        $appoin =Appointment::where('id',$customer->personal_id)->update($request,[
            "p_id"=>$request->p_id,
            "date"=>$request->date,
            "note"=>$request->note
        ]);

        return redirect()->route('appointment')->with(['success' => 'تم ألتحديث بنجاح']);

    }
    catch(Exception $ex){
return $ex;
        return redirect()->route('appointment')->with(['error' => 'هذا الموعد غير موجود ']);

    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
