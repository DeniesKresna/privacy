<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post_title','post_content'
    ];

    public $createRules = [
        'addPostTitle' => 'max:191|required',
        'addPostContent' => 'max:300'
    ];
}
