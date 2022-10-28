<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequset;
use App\Models\Appointment;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
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
    public function store(AppointmentRequset $request)
    {
try{        if(customer::where('personal_id',$request->p_id  )!=null ){
            $appoin = Appointment::create([
                'p_id'=>$request->p_id,
                'date'=>$request->date,
                'note'=>$request->note
            ]);
        }
            return redirect()->back()->with('success', 'تم اضافة موعد جديد');
        }catch(Exception $ex){
//return $ex;

            return redirect()->back()->with('error', 'حةث خطأ يرجى اعادة المحال');
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
            return $this->$ex;
         }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(AppointmentRequset $request, Appointment $appoin,$id)
    {
        $appoin = Appointment::find($id)->first();
        if (!$appoin)
        return redirect()->route('appointment')->with(['error' => 'هذا الموعد غير موجود ']);
        $appoin =Appointment::where('id', $id)->update($request->except('_token'));

        return redirect()->route('customer')->with(['success' => 'تم ألتحديث بنجاح']);


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
