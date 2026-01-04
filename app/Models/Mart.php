<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mart extends Model
{
    protected $table = 'marts';
    protected $fillable = [
        'collection_id',
        'product_name',
        'price',
        'image',
        'is_available',
        'description',
    ];
    protected $casts = [
        'image' => 'array',
        'is_available' => 'boolean',
    ];
    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function sizes()
    {
        return $this->hasMany(MartSize::class);
    }
}
