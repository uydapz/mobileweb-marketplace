<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryCollection extends Model
{
    protected $table = 'category_collections';
    protected $fillable = [
        'name',
    ];

    public function collections()
    {
        return $this->hasMany(Collection::class, 'category_id');
    }
}
