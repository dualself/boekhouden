<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account', 'type', 'vat_type', 'date', 'description', 'reference',
    ];

    /**
     * Get the company that owns the ledger.
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
