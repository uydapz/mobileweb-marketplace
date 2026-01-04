<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedDesign extends Model
{
    protected $table = 'featured_designs';
    protected $fillable = ['theme', 'description'];

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }
}
