<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];


    protected $table = 'tags';
    protected $primarykey='id';

    public $incrementing = false;


    public function posts(){
        return $this->belongsToMany(Post::class, 'post_tag', 'post_id', 'tag_id');
    }
}
