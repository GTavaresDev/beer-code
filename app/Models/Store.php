<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use App\Models\User;
use App\Models\Adress;
use App\Models\Beer;
use App\Models\CatalogItem; 

class Store extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'website',
        'phone',
        'opening_hours_json',
    ];

    public function casts(): array
    { 
        return [
             'opening_hours_json' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function adress(): HasOne
    {
        return $this->hasOne(Adress::class);
    }

    public function beers(): BelongsToMany
    {
        return $this->belongsToMany(Beer::class)
            ->withPivot(['price', 'url', 'promo_label'])
            ->withTimestamps();
    }

    public function catalogItems(): HasMany
    {
        return $this->hasMany(CatalogItem::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function cover(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable')
            ->where('is_cover', 1);
    }
}
