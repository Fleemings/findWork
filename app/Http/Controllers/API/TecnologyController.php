<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TecnologyRequest;
use App\Models\Tecnology;
use App\Traits\JsonResponse;

class TecnologyController extends Controller
{
    use JsonResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(Tecnology::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TecnologyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TecnologyRequest $request)
    {
        $tecnology = Tecnology::create([
            'name' => $request->input('name')
        ]);

        return $this->success(['tecnology' => $tecnology, 201], 'Tecnology successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tecnology = Tecnology::findOrFail($id);

        if (is_null($tecnology)) {
            return $this->error(
                '',
                'The resource does not exist',
                404
            );
        }

        return $this->success(['tecnology' => $tecnology], 'Tecnology has been sucessfully found');
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
        $tecnology = Tecnology::where('id', $id)->first();

        if (is_null($tecnology)) {
            return $this->error('', 'Unable to process this request. Element not found', 404);
        }

        $tecnology->delete();

        return $this->success(['tecnology' => $tecnology], 'Tecnology successfully removed');
    }
}
