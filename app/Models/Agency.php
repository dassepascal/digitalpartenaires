<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperAgence
 */
class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'email',
        'holder',
        'bic',
        'iban',
        'bank',
        'bank_address',
        'phone',
        'facebook',
        'home',
        'home_infos',
        'home_shipping',
        'invoice',
        'card',
        'transfer',
        'check',
        'mandat',
    ];

    public $timestamps = false;
}

