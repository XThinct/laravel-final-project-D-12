<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'price', 'stock', 'image', 'gender_category_id', 'type_category_id', 'age_category_id', 'description'];

    protected $with = ['gender_category', 'type_category', 'age_category'];

    public function gender_category(): BelongsTo
    {
        return $this->belongsTo(GenderCategory::class, 'gender_category_id');
    }

    public function type_category(): BelongsTo
    {
        return $this->belongsTo(TypeCategory::class, 'type_category_id');
    }

    public function age_category(): BelongsTo
    {
        return $this->belongsTo(AgeCategory::class, 'age_category_id');
    }

    public function scopeFilter($query, $filters)
    {

        if (isset($filters['search']) && $filters['search']) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
        }
 
        if (isset($filters['gender_category']) && $filters['gender_category']) {
            $query->whereHas('gender_category', function ($q) use ($filters) {
                $q->where('slug', $filters['gender_category']);
            });
        }

        if (isset($filters['type_category']) && $filters['type_category']) {
            $query->whereHas('type_category', function ($q) use ($filters) {
                $q->where('slug', $filters['type_category']);
            });
        }

        if (isset($filters['age_category']) && $filters['age_category']) {
            $query->whereHas('age_category', function ($q) use ($filters) {
                $q->where('slug', $filters['age_category']);
            });
        }
    
        return $query;
    }
    
}
