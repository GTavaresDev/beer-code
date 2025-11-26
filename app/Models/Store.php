<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    protected $casts = [
        'opening_hours_json' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function adress()
    {
        return $this->hasOne(Adress::class);
    }

    public function beers()
    {
        return $this->belongsToMany(Beer::class)
            ->withPivot(['price', 'url', 'promo_label'])
            ->withTimestamps();
    }

    public function catalogItems()
    {
        return $this->hasMany(CatalogItem::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
