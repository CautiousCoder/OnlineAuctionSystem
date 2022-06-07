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
    
    protected $filable = ['post_id','categry_id','tag_id'];
  


    //category relation
    public function categories(){
        return $this->belongsToMany(Category::class,'posts_categories','posts_id','categories_id')->withTimestamps();
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'posts_tags','posts_id','tags_id')->withTimestamps();
    }

}
