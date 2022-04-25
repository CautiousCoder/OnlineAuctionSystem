<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','deleted_at','updated_at'];
    protected $dates = ['publish_at'];


    //category relation
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

}
