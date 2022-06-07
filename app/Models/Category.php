<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','deleted_at','updated_at'];

    protected $primarykey='id';

    public $incrementing = false;
  
    public function post(){
        return $this->belongsToMany(Post::class,'post_categories','category_id','post_id');
    }
}
