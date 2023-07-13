<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CompanyRequest;

use App\Models\Company;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index', compact('companies'));
    }

    public function create ()
    {
        return view('company.create');
    }

    public function store(CompanyRequest $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        
        if($request->file('attachment')) {
            
            $img = $request->file('attachment');
            $image_name = 'company_'.mt_rand( 1000000000, 9999999999 ).'.'.$img->getClientOriginalExtension();
            
            $company->image_url = 'company/'.$image_name;
            $img->storeAs('company', $image_name);
        }

        $company->save();

        return redirect('company')->with('success', 'Company Created Successfully');
    }

    public function edit($id)
    {
        $company = Company::find($id);
        return view('company.edit', compact('company'));
    }

    public function update(CompanyRequest $request, $id)
    {
        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        
        if($request->file('attachment')) {
            $img = $request->file('attachment');
            $image_name = 'company_'.mt_rand( 1000000000, 9999999999 ).'.'.$img->getClientOriginalExtension();
            
            $company->image_url = 'company/'.$image_name;
            $img->storeAs('company', $image_name);
        }
        $company->save();

        return redirect('company')->with('success', 'Company Updated Successfully');
    }

    public function destroy($id)
    {
        Company::find($id)->delete();
        return redirect('company')->with('success', 'Company Deleted Successfully');
    }
}
