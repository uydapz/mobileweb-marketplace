<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimonis';
    protected $fillable = ['quote','show'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
