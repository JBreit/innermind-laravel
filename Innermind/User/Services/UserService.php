<?php

namespace Innermind\User\Services;

use Innermind\User\Entities\User;

class UserService
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->all();
    }

    public function findBy($field, $value)
    {
        return $this->user->where($field, $value)->get();
    }

    public function add(array $data)
    {
        return $this->user->create($data);
    }

    public function remove($id)
    {
        return $this->user->destroy($id);
    }
}
