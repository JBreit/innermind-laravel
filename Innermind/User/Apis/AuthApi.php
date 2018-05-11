<?php

namespace Innermind\User\Apis;

use Innermind\Support\Http\AuthController;
use Innermind\User\Requests\UpdatePasswordRequest;
use Innermind\User\Requests\UpdatePersonalRequest;
use Innermind\User\Services\AuthUserService;
use Innermind\User\Entities\User;
use Illuminate\Http\Request;
use Validator;
use Hash;

class AuthApi extends AuthController
{
    protected $redirectTo = '/dashboard';

    protected $redirectAfterLogout = '/login';

    protected $service;

    public function __construct(AuthUserService $service)
    {
        $this->service = $service;
    }

    protected function profile()
    {
        return view('auth.profile');
    }

    protected function updatePassword(UpdatePasswordRequest $request)
    {
        $this->service->updatePassword($request->user(), $request->all());

        return back();
    }

    protected function updatePersonal(UpdatePersonalRequest $request)
    {
        $this->service->updatePersonal($request->user(), $request->all());

        return back();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $request->session()->flash('status', "Welcome {$user->name}.");
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        $request->session()->flash('status', "{$user->name} thank you for registering.");
    }
}