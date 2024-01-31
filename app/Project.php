<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'promoter_id','wallet_balance'];

    public function amortizations()
    {
        return $this->hasMany(Amortization::class);
    }
}