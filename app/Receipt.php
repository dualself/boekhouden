<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Receipt extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_id', 'type', 'vat_type', 'date', 'description', 'reference',
    ];

    /**
     * Get the company that owns the ledger.
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    /**
     * Get the ledger account that owns the receipt.
     *
     * @return BelongsTo
     */
    public function account()
    {
        return $this->belongsTo('App\Ledger');
    }
}
