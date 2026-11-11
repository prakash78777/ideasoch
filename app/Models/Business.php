<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'location',
        'business_type',
        'time',
        'investment_min',
        'investment_max',
        'profit',
        'description',
        'image',
        'status',
        'how_to_start',
        'required_things',
        'planning_steps',
    ];

    protected $casts = [
        'investment_min' => 'integer',
        'investment_max' => 'integer',
        'status' => 'boolean',
    ];

    public function savedIdeas(): HasMany
    {
        return $this->hasMany(SavedIdea::class);
    }
}
