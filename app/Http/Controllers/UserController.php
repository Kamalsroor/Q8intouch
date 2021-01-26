<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\User;
use Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        //
        return $dataTable->render('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('users.craete');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        try {

            $user = new User();
            $user->name = $request->name ;
            $user->username = $request->username ;
            $user->email = $request->email ;
            $user->phone_number = $request->phone_number ;
            $user->password = Hash::make($request->password) ;
            $user->civil_id = $request->civil_id ;
            $user->stop_number = $request->stop_number ;
            $user->nationality = $request->nationality ;
            $user->gender = $request->gender ;
            $user->social_status = $request->social_status ;
            $user->age = $request->age ;
            $user->diets_before = $request->diets_before ;
            $user->height = $request->height ;
            $user->current_weight = $request->current_weight ;
            $user->physical_activity = $request->physical_activity ;
            $user->medications = $request->medications ;
            $user->water_intake = $request->water_intake ;
            $user->appetite = $request->appetite ;
            $user->sleep = $request->sleep ;
            $user->save();

        } catch (\Exception $e) {
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
    public function show(User $user)
    {
        dd($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        //
        try {
            $user->name = $request->name ;
            $user->email = $request->email ;
            if ($request->has('password')) {
                $user->password = Hash::make($request->password) ;
            }


            $user->username = $request->username ;
            $user->phone_number = $request->phone_number ;
            $user->civil_id = $request->civil_id ;
            $user->stop_number = $request->stop_number ;
            $user->nationality = $request->nationality ;
            $user->gender = $request->gender ;
            $user->social_status = $request->social_status ;
            $user->age = $request->age ;
            $user->diets_before = $request->diets_before ;
            $user->height = $request->height ;
            $user->current_weight = $request->current_weight ;
            $user->physical_activity = $request->physical_activity ;
            $user->medications = $request->medications ;
            $user->water_intake = $request->water_intake ;
            $user->appetite = $request->appetite ;
            $user->sleep = $request->sleep ;


            $user->save();
        } catch (\Exception $e) {
            return $this->error(['message' => $e->getMessage()]);
        }
        return $this->success(['message' => trans('app.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (\Exception $e) {
            return $this->error(['message' => $e->getMessage()]);
        }
        return $this->success(['message' => trans('app.destroyed')]);
    }
}
