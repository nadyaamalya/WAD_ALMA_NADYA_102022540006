<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();

        return view ('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|string|max:50|unique:employees,employee_id',
            'employee_name' => 'required|string|max:255',
            'contact' => 'required|string|max:30',
            'job_title' => 'required|in:Chef,Waiter,Cashier,Manager',
            'status' => 'required|in:Active,Inactive',
        ]);

        Employee::create($validated);

        return redirect()->route('employee.index')->with('success', 'Employee added succesfilly!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);

        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrFail($id);

        $validated =$request->validate([
            'employee_id' => 'required|string|max:50|unique:employees,employee_id,' . $employee->id,
            'employee_name' => 'required|string|max:255',
            'contact' => 'required|string|max:30',
            'job_title' => 'required|in:Chef,Waiter,Cashier,Manager',
            'status' => 'required|in:Active,Inactive',
        ]);

        $employee->update($validated);

        return redirect()->route('employee.index')->with('success', 'Employee updated successfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::FindOrFail($id);

        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully!');
    }
}
