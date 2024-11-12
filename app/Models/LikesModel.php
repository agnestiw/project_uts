<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikesModel extends Model
{
    use HasFactory;

    protected $table = 'likes';

    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(PostsModel::class, 'post_id');
    }
}
