<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'post_id';
    
    public function category(){
    	return $this->belongsTo('App\Category', 'category_id');
    }
}
