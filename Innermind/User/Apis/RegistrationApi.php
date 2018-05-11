<?php

namespace Innermind\User\Apis;

use Innermind\Support\Http\Controller;
use Innermind\User\Services\RegistrationService;
use Innermind\User\Requests\RegistrationForm;
use Illuminate\Http\Request;

class RegistrationApi extends Controller
{
    protected $service;

    public function __construct(RegistrationService $service)
    {
        $this->service = $service;
    }

    protected function create()
    {
        return view('auth.register');
    }

    protected function store(RegistrationForm $request)
    {
        $this->service->register($request);        

        session()->flash('status', 'Thanks for registering!');

        return redirect()->home();
    }
}
