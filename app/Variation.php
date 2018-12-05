<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $table = 'variations';
    protected $fillable = [
        'sku',
        'image',
        'product_id',
        'price',
        'stock'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function specifications()
    {
        return $this->hasMany(Specification::class);
    }
}
