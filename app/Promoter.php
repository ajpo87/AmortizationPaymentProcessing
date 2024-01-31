<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promoter extends Model
{
    protected $fillable = ['name', 'email'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}