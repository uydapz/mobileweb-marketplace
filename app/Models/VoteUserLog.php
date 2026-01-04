<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteUserLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'vote_id',
        'user_id',
        'vote_collection_id',
    ];

    public function vote()
    {
        return $this->belongsTo(Vote::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voteCollection()
    {
        return $this->belongsTo(VoteCollection::class);
    }
}
