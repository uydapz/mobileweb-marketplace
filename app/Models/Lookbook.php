<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lookbook extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'cover_image',
        'period_month',
        'period_year'
    ];

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'lookbook_collection');
    }
}
