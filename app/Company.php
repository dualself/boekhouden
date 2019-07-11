<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'coc_number',
    ];

    /**
     * Get the user that owns the company.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
