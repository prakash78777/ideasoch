<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiQuestion extends Model
{
   protected $fillable = [
    'question',
    'category',
    'prompt',
    'status',
];

protected function casts(): array
{
    return [
        'status' => 'boolean',
    ];
}
}
