<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';
    protected $fillable = ['product_id', 'image'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function getProductImageById(int $imageId, int $productId)
    {
         $image = ProductImage::where('id', $imageId)->where('product_id', $productId)->first();
         return $image;
    }



}
