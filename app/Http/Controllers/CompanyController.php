<?php

namespace App\Http\Controllers;

use App\Company;
use Dotenv\Result\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index');
    }

    public function show($companyId)
    {
        $company = Company::find($companyId);
        return view('company.show', compact('company'));
    }

    public function create()
    {
        
        return view('company.create');
    }

    public function store(Request $request)
    {
        $company = new Company($request->all());
        $company->save();

        return redirect()->route('companies.index');
    }

    public function edit($companyId)
    {
        $company = Company::find($companyId);
        return view('company.edit', compact('company'));
    }

    public function update(Request $request)
    {
        $company = Company::find($request->get('id'));
        $company->update($request->all());
        
        return redirect()->route('companies.index');
    }

    public function destroy($companyId)
    {
        
        $company = Company::find($companyId);
        if($company->delete()) {
            return response()->json(["success" => 200], 200);
        } else {
            return response()->json(["success" => 404], 404);
        }
    }

    public function getCompanies()
    {
       
        return datatables()->of(Company::all())
                ->addColumn('action', function($row){
                        $btn = '<a href="/companies/'.$row->id.'" class="edit btn btn-info btn-sm">View</a>';
                        $btn = $btn.'<a href="/companies/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>';
                        $btn = $btn.'<a href="javascript:deleteCompany('.$row->id.')" class="edit btn btn-danger btn-sm">Delete</a>';
        
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
    
}
