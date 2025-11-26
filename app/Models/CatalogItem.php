<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $table = 'adresses';

    protected $fillable = [
        'store_id',
        'zip_code',
        'street',
        'number',
        'neighborhood',
        'city',
        'state',
        'country',
        'latitude',
        'longitude',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
