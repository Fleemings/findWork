<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EducationRequest;
use App\Models\Education;
use App\Traits\JsonResponse;

class EducationController extends Controller
{
    use JsonResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(Education::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EducationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationRequest $request)
    {
        $education = Education::create([
            'school' => $request->input('school'),
            'degree' => $request->input('degree'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'description' => $request->input('description'),
            'currently' => $request->input('currently'),
        ]);

        return $this->success(['company' => $education, 201], 'Education successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $education = Education::join('educations_tecnologies', 'educations_tecnologies.education_id', '=', 'educations.id')->where('educations.id', $id)->get();

        if (is_null($education)) {
            return $this->error(
                '',
                'The resource does not exist',
                404
            );
        }

        return $this->success(['education', $education], 'Education has been sucessfully found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = Education::where('id', $id)->first();

        if (is_null($education)) {
            return $this->error('', 'Unable to process this request. Element not found', 404);
        }

        $education->delete();

        return $this->success(['education' => $education], 'Education successfully removed');
    }
}
