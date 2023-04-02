<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index(Request $request)
    {

        return view('pages.employer.company.index', [
            'companies' => $request->user()->companies()->latest()->get()
        ]);
    }


    public function create()
    {
        return view('pages.employer.company.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:40',
            'description' => 'required|string|min:3|max:500',
            'website_url' => 'required|string|min:2|max:500',
            'logo' => 'required|file|mimes:jpg,jpeg,png|max:10000',
        ]);

        $logo_url = $request->file('logo')->store("public/company_logo");
        unset($data['logo']);
        $data['logo_url'] = str_replace('public', '/storage', $logo_url);

        $request->user()->companies()->create($data);
        return redirect()->route('companies.index')->with('success', "company created successfully!");
    }


    public function show(Company $company)
    {
        return view('pages.employer.company.show',compact('company'));
    }


    public function edit(Company $company)
    {
        return view('pages.employer.company.edit', compact('company'));
    }


    public function update(Request $request, Company $company)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:40',
            'description' => 'required|string|min:3|max:500',
            'website_url' => 'required|string|min:2|max:500',
            'logo' => 'file|mimes:jpg,jpeg,png|max:10000',
        ]);

        if (isset($data['logo'])) {
            $logo_url = $request->file('logo')->store("public/company_logo");
            unset($data['logo']);
            $data['logo_url'] = str_replace('public', '/storage', $logo_url);
        }

        $company->update($data);
        return redirect()->route('companies.index')->with('success', "company updated successfully!");

    }


    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', "company deleted successfully!");
    }
}