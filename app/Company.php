<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $fillable = [
        'name', 'coc_number',
    ];

    /**
     * Get the ledgers of the user.
     *
     * @return HasMany
     */
    public function ledgers()
    {
        return $this->hasMany('App\Ledger');
    }

    /**
     * Get the receipts of the user.
     *
     * @return HasMany
     */
    public function receipts()
    {
        return $this->hasMany('App\Receipt');
    }

    /**
     * Get the user that owns the company.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get active payment ledgers.
     *
     * @return HasMany
     */
    public function getActivePaymentLedgers()
    {
        return $this->ledgers()->where('category', 'BET')->where('active', TRUE);
    }

    /**
     * Installs defaults.
     *
     * @param \App\Company $company
     */
    public static function installDefaults(&$company)
    {
        $ledgers = [];

        foreach (config('enums.ledger_defaults') as $ledger) {
            array_push($ledgers, new Ledger($ledger));
        }

        if (count($ledgers) > 0 && isset($company)) {
            $company->ledgers()->saveMany($ledgers);
        }
    }
}
