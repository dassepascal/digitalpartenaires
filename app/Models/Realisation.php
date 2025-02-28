<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperRealisation
 */
class Realisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'url',
      
       
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'realisation_category');
    }
}
