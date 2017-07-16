<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'name', 'type', 'parent_id'
    ];

    public function project()
    {
        $this->belongsTo('App\Models\Project');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Document', 'parent_id');
    }
}
