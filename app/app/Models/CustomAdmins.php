<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class CustomUser extends Authenticatable
{
    protected $table = 'custom_admin';

}

