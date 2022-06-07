<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','deleted_at','updated_at'];
    protected $dates = ['publish_at'];
    protected $primarykey='id';

    public $incrementing = false;
  


    //category relation
    public function categories(){
        return $this->belongsToMany(Category::class,'post_categories','category_id','post_id')->withTimestamps();
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tags','tag_id','post_id')->withTimestamps();
    }

}
