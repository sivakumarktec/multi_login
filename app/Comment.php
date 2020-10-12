<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = 'comments';

    protected $fillable = [
        'comments', 'created_by', 'is_admin_created'
    ];
}
