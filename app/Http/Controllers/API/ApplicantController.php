<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\ApplicantRequest;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicantResource;
use App\Models\Education;
use App\Traits\JsonResponse;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;


class ApplicantController extends Controller
{
    use JsonResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(Applicant::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ApplicantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicantRequest $request)
    {

        $applicant = Applicant::create([
            'id' => Auth::user()->id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'job_title' => $request->input('job_title'),
            'city' => $request->input('city'),
            'website' => $request->input('website'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'about_me' => $request->input('about_me'),

        ]);

        return $this->success(['applicant' => $applicant, 201], 'Applicant successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $applicant = Applicant::join('experiences', 'experiences.applicant_id', '=', 'applicants.id')
            ->join('educations', 'educations.applicant_id', '=', 'applicants.id')->where('applicants.id', $id)->get();

        if (is_null($applicant)) {
            return $this->error(
                '',
                'The resource does not exist',
                404
            );
        }

        return $this->success(['applicant', $applicant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request

     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $applicant = Applicant::where('id', $id)->first();

        if (is_null($applicant)) {
            return $this->error('', 'There is no record to be updated', 404);
        }

        $applicant->update($request->all());

        return $this->success(['applicant' => $applicant], 'Applicant successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $applicant = Applicant::where('id', $id)->first();

        if (is_null($applicant)) {
            return $this->error('', 'Unable to process this request. Element not found', 404);
        }

        $applicant->delete();

        return $this->success(['applicant' => $applicant], 'Applicant successfully removed');
    }
}
