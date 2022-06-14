<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['publish_at'];
    protected $table = 'posts';
    
    protected $fillable = [
        'category_id',
        'post_id',
        'tag_id',
    ];

    public $incrementing = false;
    
  
    public function user(){
        return $this->belongsTo(User::class);
    }

    //category relation
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

}
