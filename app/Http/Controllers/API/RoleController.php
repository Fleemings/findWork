<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Traits\JsonResponse;

class RoleController extends Controller
{
    use JsonResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(Role::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create([
            'title' => $request->input('title'),
            'salary' => $request->input('salary'),
            'benefit' => $request->input('benefit'),
            'description' => $request->input('description'),
            'experience_time' => $request->input('experience_time'),
            'company_id' => $request->input('company_id'),
        ]);

        return $this->success(['role' => $role, 201], 'Role successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Show the informations in the Role table with the applicats that has applied to the roles

        $role = Role::join('applicants_roles', 'roles.id', '=', 'applicants_roles.id')->where('roles.id', $id)->get();

        if (is_null($role)) {
            return $this->error(
                '',
                'The resource does not exist',
                404
            );
        }

        return $this->success(['role' => $role], 'Role has been sucessfully found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\RoleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $role = Role::where('id', $id)->first();

        if (is_null($role)) {
            return $this->error('', 'There is no record to be updated', 404);
        }

        $role->update($request->all());

        return $this->success(['role' => $role], 'Role successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::where('id', $id)->first();

        if (is_null($role)) {
            return $this->error('', 'Unable to process this request. Element not found', 404);
        }

        $role->delete();

        return $this->success(['role' => $role], 'Role successfully removed');
    }
}
