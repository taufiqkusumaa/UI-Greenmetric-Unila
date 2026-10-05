<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Category;
use App\Models\Submission;

class Indicator extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'unit', 'max_score'];

    // app/Models/Indicator.php
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function submissions(): HasMany
    {
        return $this->hasMany(Submission::class);
    }
}
