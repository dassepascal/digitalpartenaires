<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperCountry
 */
class Country extends Model
{
    protected $fillable = [
        'name', 'tax',
    ];
    
    public $timestamps = false;

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
}
