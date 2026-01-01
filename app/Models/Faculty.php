<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Faculty extends Model
{
    protected $fillable = [
        'name',
        'description',
        'budget_places',
        'education_years'
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}
