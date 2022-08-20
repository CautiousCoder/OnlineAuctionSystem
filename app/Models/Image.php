<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $gaurded = [];

    public function post()
    {
        return $this->belongsTo(Image::class, 'post_id');
    }
}
