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
  
    protected $filable = ['post_id','categry_id'];
    public function post(){
        return $this->belongsToMany(Post::class,'posts_categories','posts_id','categories_id');
    }
}
