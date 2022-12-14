<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Traits\JsonResponse;

class CompanyController extends Controller
{
    use JsonResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(Company::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  CompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $company = Company::create([
            'name' => $request->input('name'),
            'review' => $request->input('review'),
            'short_description' => $request->input('short_description')
        ]);

        return $this->success(['company' => $company, 201], 'Company successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $company = Company::leftjoin('roles', 'companies.id', '=', 'roles.company_id')->where('companies.id', $id)->get();

        if (is_null($company)) {
            return $this->error(
                '',
                'The resource does not exist',
                404
            );
        }

        return $this->success(['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CompanyRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $company = Company::where('id', $id)->first();

        if (is_null($company)) {
            return $this->error('', 'There is no record to be updated', 404);
        }

        $company->update($request->all());

        return $this->success(['company' => $company], 'Company successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::where('id', $id)->first();

        if (is_null($company)) {
            return $this->error('', 'Unable to process this request. Element not found', 404);
        }

        $company->delete();

        return $this->success(['company' => $company], 'Company successfully removed');
    }
}
