<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Response::api([
            'message' => 'Your companies!',
            'data' => $request->user()->companies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        throw_if(
            $request->user()->companies()->count() >= 3,
            ValidationException::withMessages([
                'message' => 'You can only add 3 companies',
            ]),
        );

        $company = Company::create($request->all());

        return Response::api([
            'message' => 'Company added!',
            'data' => $company
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, Company $company)
    {
        Gate::authorize('update', $company);

         $company->update($request->all());

        return Response::api([
            'message' => 'Company updated!',
            'data' => $company
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        Gate::authorize('update', $company);

        $company->delete();
        return Response::api('Company deleted!');

    }

    public function allCompanies()
    {
        return Response::api([
            'message' => 'All companies!',
            'data' => User::with(['companies', 'services'])->get()
        ]);
    }
}
