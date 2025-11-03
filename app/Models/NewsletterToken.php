<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterToken extends Model
{
     protected $fillable = [
        'newsletter_id',
        'user_id',
        'tracking_token',
        'unsubscribe_token',
        'generated_at',
    ];

    protected $dates = ['generated_at'];

    public function newsletter()
    {
        return $this->belongsTo(Newsletter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
