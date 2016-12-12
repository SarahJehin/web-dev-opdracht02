<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'name_nl', 'name_fr', 'name_en', 'description_nl', 'description_fr', 'description_en', 'price', 'image', 'category_id',
    ];
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function collections()
    {
        return $this->belongsToMany('App\Collection');
    }
}