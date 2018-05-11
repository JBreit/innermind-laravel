<?php

namespace Innermind\User\Services;

class AuthUserService
{
    public function updatePassword($user, $data)
    {
        if($user->update($data)) {
            return success('Your password has been changed.');
        }

        return error('Something has gone wrong.', $user);
    }

    public function updatePersonal($user, $data)
    {
        if ($user->update($data)) {
            return success('Your profile has been updated.');
        }

        return error('Something has gone wrong.', $user);
    }
}