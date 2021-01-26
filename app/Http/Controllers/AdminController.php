<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\AdminsDataTable;
use App\Http\Requests\StoreAdmin;
use App\Http\Requests\UpdateAdmin;
use App\Admin;
use Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminsDataTable $dataTable)
    {
        //
        return $dataTable->render('admins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admins.craete');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdmin $request)
    {
        try {
            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
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
    public function show(Admin $admin)
    {
        dd($admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admins.edit' , compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdmin $request, Admin $admin)
    {
        //
        try {
            $admin->name = $request->name ;
            $admin->email = $request->email ;
            if ($request->has('password')) {
                $admin->password = Hash::make($request->password) ;
            }
            $admin->save();
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
    public function destroy(Admin $admin)
    {
        try {
            $admin->delete();
        } catch (\Exception $e) {
            return $this->error(['message' => $e->getMessage()]);
        }
        return $this->success(['message' => trans('app.destroyed')]);
    }
}
