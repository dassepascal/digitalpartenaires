<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPage
 */
class Page extends Model
{
  use HasFactory;

  protected $fillable = [
    'title', 'slug', 'text', 'image'
  ];

  public $timestamps = false;
}
