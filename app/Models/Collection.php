<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collections';
    protected $fillable = [
        'featured_design_id',
        'category_id',
        'name',
        'image',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryCollection::class, 'category_id');
    }
    public function votes()
    {
        return $this->belongsToMany(Vote::class, 'vote_collections')
            ->withPivot('vote_count')
            ->withTimestamps();
    }

    public function featuredDesign()
    {
        return $this->belongsTo(FeaturedDesign::class);
    }
}
