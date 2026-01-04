<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['user_id', 'title', 'slug', 'content', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
