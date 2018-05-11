<?php

namespace Innermind\Support\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

abstract class Auth extends Authenticatable
{
    use Notifiable;
    use CanResetPassword;
}