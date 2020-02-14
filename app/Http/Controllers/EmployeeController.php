<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('empmodel', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'mobile' => 'required',
        ]);

        $emp = new Employee;
        $emp->fname = $request->input('fname');
        $emp->lname = $request->input('lname');
        $emp->address = $request->input('address');
        $emp->mobile = $request->input('mobile');
        $emp->save();
        return redirect('/employee')->with('success', 'Data Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'mobile' => 'required',
        ]);

        $emp = Employee::find($id);
        $emp->fname = $request->input('fname');
        $emp->lname = $request->input('lname');
        $emp->address = $request->input('address');
        $emp->mobile = $request->input('mobile');
        $emp->save();
        return redirect('/employee')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Employee::find($id);
        $emp->delete();
        return redirect('/employee')->with('success', 'Data deleted');
    }

    public function update_invoice($id)
    {
        return 'success';
    }
}
