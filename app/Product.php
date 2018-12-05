<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function Sodium\crypto_box_publickey_from_secretkey;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'type'
    ];

    public function variations()
    {
        return $this->hasMany(Variation::class);
    }
}

