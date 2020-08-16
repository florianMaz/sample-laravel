<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.index');
    }

    public function show($employeeId)
    {
        $employee = Employee::find($employeeId);
        return view('employee.show', compact('employee'));
    }

    public function create()
    {
        $companies = Company::all()->pluck('name', 'id');   
        return view('employee.create', compact('companies'));
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $employee = new Employee($request->all());
        $employee->save();

        return redirect()->route('employees.index');
    }

    public function edit($employeeId)
    {
        $companies = Company::all()->pluck('name', 'id'); 
        $employee = Employee::find($employeeId);
        return view('employee.edit', compact('employee', 'companies'));
    }

    public function update(Request $request)
    {
        $employee = Employee::find($request->get('id'));
        $employee->update($request->all());
        
        return redirect()->route('employees.index');
    }

    public function destroy($employeeId)
    {
        
        $employee = Employee::find($employeeId);
        if($employee->delete()) {
            return response()->json(["success" => 200], 200);
        } else {
            return response()->json(["success" => 404], 404);
        }
    }

    public function getEmployees(Request $request)
    {
        return datatables()->of(Employee::with('company'))
        ->addColumn('company', function (Employee $employee) {
            return $employee->company->name;
        })
        ->addColumn('action', function($row){
                $btn = '<a href="/employees/'.$row->id.'" class="edit btn btn-info btn-sm">View</a>';
                $btn = $btn.'<a href="/employees/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn.'<a href="javascript:deleteEmployee('.$row->id.')" class="edit btn btn-danger btn-sm">Delete</a>';

                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    
}
