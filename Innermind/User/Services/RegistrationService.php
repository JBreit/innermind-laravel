<?php

namespace Innermind\User\Services;

use Innermind\User\Entities\User;

class RegistrationService
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register(object $request)
    {
        try {

            $validated = $request->validated();

            $user = $this->user->create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password'])
            ]);

            auth()->login($user);

        } catch (\Exception $e) {

            \Log::error($e->getMessage());

            throw new \Exception('Unable to register user.');

        }
    }
}