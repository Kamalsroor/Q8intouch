<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\AppointmentsDataTable;
use App\Http\Requests\StoreAppointment;
use App\Http\Requests\UpdateAppointment;
use App\Appointment;
use App\User;
use App\Admin;
use Hash;
use DB;

class AppointmentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AppointmentsDataTable $dataTable)
    {
        //
        return $dataTable->render('appointments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Users = User::orderby('name','asc')->pluck('name','id')->toArray();
        $Admnis = Admin::orderby('name','asc')->pluck('name','id')->toArray();
        return view('appointments.craete', compact('Users','Admnis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointment $request)
    {
        try {

            $appointment = new Appointment();
            $appointment->status = $request->status ;
            $appointment->user_id = $request->user_id ;
            if ($request->user_id == 0) {
                $appointment->name = $request->name ;
                $appointment->phone_number = $request->phone_number ;
                $appointment->civil_id = $request->civil_id ;
            }else{
                $User = User::find($request->user_id);
                $User->name = $request->name ;
                $User->phone_number = $request->phone_number ;
                $User->civil_id = $request->civil_id ;
                $User->save();
            }
            $appointment->admin_id = $request->admin_id ;
            $appointment->date = $request->date ;
            $appointment->time = $request->time ;
            $appointment->save();

        } catch (\Exception $e) {
            DB::rollback();
            return $this->error(['message' => $e->getMessage()]);
        }
        return $this->success(['message' => trans('app.added')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        dd($appointment);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUser(Request $request)
    {
        if ($request->id > 0) {
            $User = User::find($request->id);
        }
        return $this->ok($User);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAppointmentByDate(Request $request)
    {
        // if ($request->id > 0) {
        //     $User = User::find($request->date);
        // }

        $Appointments = Appointment::where('date',$request->date)->get();
        return view('appointments.Appointment_date', compact('Appointments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $Users = User::orderby('name','asc')->pluck('name','id')->toArray();
        $Admnis = Admin::orderby('name','asc')->pluck('name','id')->toArray();
        return view('appointments.edit' , compact('appointment','Users','Admnis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointment $request, Appointment $appointment)
    {
        //

        try {

            $appointment->status = $request->status ;
            $appointment->user_id = $request->user_id ;
            if ($request->user_id == 0) {
                $appointment->name = $request->name ;
                $appointment->phone_number = $request->phone_number ;
                $appointment->civil_id = $request->civil_id ;
            }else{
                $User = User::find($request->user_id);
                $User->name = $request->name ;
                $User->phone_number = $request->phone_number ;
                $User->civil_id = $request->civil_id ;
                $User->save();
            }
            $appointment->admin_id = $request->admin_id ;
            $appointment->date = $request->date ;
            $appointment->time = $request->time ;
            $appointment->save();

        } catch (\Exception $e) {
            DB::rollback();
            return $this->error(['message' => $e->getMessage()]);
        }
        return $this->success(['message' => trans('app.added')]);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        try {
            $appointment->delete();
        } catch (\Exception $e) {
            return $this->error(['message' => $e->getMessage()]);
        }
        return $this->success(['message' => trans('app.destroyed')]);
    }
}
