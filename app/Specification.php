<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specification extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'title_nl', 'title_fr', 'title_en', 'description_nl', 'description_fr', 'description_en', 'product_id',
    ];
    
    
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
