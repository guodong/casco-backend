<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    protected $fillable = [
        'password', 'account', 'realname', 'jobnumber', 'role', 'locked'
    ];
}
