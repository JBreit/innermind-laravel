<?php

namespace Innermind\User\Apis;

use Innermind\Support\Http\Controller;
use Innermind\User\Services\UserService;
use Illuminate\Http\Request;

class UserApi extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    protected function index()
    {
        $users = $this->service->getAll();

        return view('user.index', compact('users'));
    }

    protected function show(Request $request, string $id)
    {
        $user = $this->service->findBy('id', $id)->first();

        return view('user.show', compact('user'));
    }

    protected function edit(Request $request, string $id)
    {
        try {

        } catch (\Exception $e) {

            \Log::error($e->getMessage());

            throw new \Exception($e->getMessage());
        }
    }

    protected function update(Request $request, string $id)
    {
        //
    }

    protected function destroy(Request $request, string $id)
    {
        //
    }
}
