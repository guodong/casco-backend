<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Version extends Model
{
    protected $fillable = [
        'name', 'document_id'
    ];

    public function rss()
    {
        return $this->hasMany('App\Models\Rs');
    }

    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }
}
