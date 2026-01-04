<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'vote_id',
        'collection_id',
        'vote_count',
    ];

    public function vote()
    {
        return $this->belongsTo(Vote::class);
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
}
