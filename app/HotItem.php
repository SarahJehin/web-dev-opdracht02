<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotItem extends Model
{
    
    protected $table = 'hot_items';
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'product_id', 'position',
    ];
    
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
