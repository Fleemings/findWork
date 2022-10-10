<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExperienceRequest;
use App\Models\Experience;
use App\Traits\JsonResponse;

class ExperienceController extends Controller
{
    use JsonResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(Experience::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExperienceRequest $request)
    {
        $experience = Experience::create([
            'role' => $request->input('role'),
            'company_name' => $request->input('company_name'),
            'city' => $request->input('city'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'currently' => $request->input('currently'),
            'description' => $request->input('description'),
        ]);

        return $this->success(['experience' => $experience, 201], 'Experience successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $experience = Experience::join('experiences_tecnologies', 'experiences_tecnologies.experience_id', '=', 'experiences.id')->where('experiences.id', $id)->get();

        if (is_null($experience)) {
            return $this->error(
                '',
                'The resource does not exist',
                404
            );
        }

        return $this->success(['experience', $experience], 'Experience has been sucessfully found');
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
        $experience = Experience::where('id', $id)->first();

        if (is_null($experience)) {
            return $this->error('', 'Unable to process this request. Element not found', 404);
        }

        $experience->delete();

        return $this->success(['experience' => $experience], 'Experience successfully removed');
    }
}
