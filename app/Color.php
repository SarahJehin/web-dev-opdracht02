<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'hexcode',
    ];
    
    
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
    
}
