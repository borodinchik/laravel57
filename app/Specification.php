<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    protected $table = 'specifications';
    protected $fillable = [
        'variation_id',
        'attribute',
        'value'
    ];

    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }
}
