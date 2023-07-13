<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\EmployeeRequest;

use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employee.index', compact('employees'));
    }

    public function create ()
    {
        $companies = Company::all();
        return view('employee.create', compact('companies'));
    }

    public function store(EmployeeRequest $request)
    {
        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();

        return redirect('employee')->with('success', 'Employee Created Successfully');
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $companies = Company::all();

        return view('employee.edit', compact('employee', 'companies'));
    }

    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();
        
        return redirect('employee')->with('success', 'Employee Updated Successfully');
    }

    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect('employee')->with('success', 'Employee Deleted Successfully');
    }
}
