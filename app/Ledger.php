<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'description', 'category', 'active',
    ];

    /**
     * Gets ledger code.
     *
     * @param integer $value
     *
     * @return string
     */
    public function getCodeAttribute($value) {
        return str_pad($value, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Gets ledger category.
     *
     * @param string $value
     *
     * @return string
     */
    public function getCategoryAttribute($value) {
        $categories = config('enums.ledger_categories');

        if (array_key_exists($value, $categories)) {
            return $categories[$value];
        }

        return '';
    }

    /**
     * Get the company that owns the ledger.
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
