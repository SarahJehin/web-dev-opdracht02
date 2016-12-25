<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'name_nl', 'name_fr', 'name_en',
    ];
    
    public function products()
    {
        return $this->hasMany('App\Product');
    }
    
    public function faqs()
    {
        return $this->belongsToMany('App\Faq');
    }
}
