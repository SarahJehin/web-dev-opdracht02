<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'question_nl', 'question_fr', 'question_en', 'answer_nl', 'answer_fr', 'answer_en',
    ];
    
    
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
    
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
