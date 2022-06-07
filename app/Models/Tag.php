<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = ['created_at','deleted_at','updated_at'];
    use HasFactory;
    protected $primarykey='id';

    public $incrementing = false;
  

    public function posts(){
        return $this->belongsToMany(Post::class,'post_tags','tag_id','post_id');
    }
}
