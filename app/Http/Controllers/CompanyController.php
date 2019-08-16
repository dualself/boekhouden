<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    /**
     * Creates a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Shows the form for editing the specified resource.
     *
     * @param Company $company
     * @return Response
     */
    public function edit(Company $company)
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var Company $company */
        $company = $user->company()->find($company->id);

        if (!$company) {
            abort(404);
        }

        return view('company.edit', compact('company'));
    }

    /**
     * Updates the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Company  $company
     * @return Response
     */
    public function update(Request $request, Company $company)
    {
        /** @var User $user */
        $user = Auth::user();

        $validation = [];

        /** @var Company $company */
        $company = $user->company()->find($company->id);

        if (!$company) {
            abort(404);
        }

        if ($company->getOriginal('name') != $request->get('name')) {
            $validation['name'] = 'required|max:255';

            $company->name = $request->get('name');
        }

        if ($company->getOriginal('coc_number') != $request->get('coc_number')) {
            $validation['coc_number'] = 'required|numeric|digits:8|unique:companies';

            $company->coc_number = $request->get('coc_number');
        }

        $request->validate($validation);

        $company->save();

        return redirect()->route('company.edit', [$company->id])->with('success', __('Bedrijfsgegevens zijn succesvol aangepast!'));
    }
}
