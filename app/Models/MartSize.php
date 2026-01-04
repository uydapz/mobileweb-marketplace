<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MartSize extends Model
{
    protected $fillable = ['mart_id', 'size', 'stock'];

    public function mart()
    {
        return $this->belongsTo(Mart::class);
    }
}
