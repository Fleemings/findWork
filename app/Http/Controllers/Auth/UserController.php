<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisteredUserRequest;
use App\Models\User;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    use JsonResponse;

    /**
     * Store a newly created resource in storage.
     *
     * @param  RegisteredUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisteredUserRequest $request)
    {
        $request->validated($request->all());
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        $token = $user->createToken('API_TOKEN')->plainTextToken;

        return $this->success([
            'user' => $user,
            'token' => $token
        ], 'User created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LoginUserRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login(LoginUserRequest $request)
    {
        $userRequest = $request->all();

        if (!Auth::attempt($userRequest)) {
            return $this->error(
                'No Record Found',
                'Unauthorized Credentials',
                401
            );
        }

        // Email that needs to matches with the email registered
        $user = User::where('email', $request->get('email'))->first();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API_TOKEN')->plainTextToken
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = auth()->user();

        return $this->success(['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::user()->tokens()->delete();

        return $this->success([
            'message' => 'You have been successfully logout and the token has been deleted'
        ]);
    }
}
