<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'name_nl', 'name_fr', 'name_en',
    ];
    
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
