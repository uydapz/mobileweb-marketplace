<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vote extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'start_at', 'end_at', 'is_active'];

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'vote_collections')
            ->withPivot('vote_count')
            ->withTimestamps();
    }

    public function logs()
    {
        return $this->hasMany(VoteUserLog::class);
    }
}
