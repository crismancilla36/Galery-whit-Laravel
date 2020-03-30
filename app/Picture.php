<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'title', 'user', 'description',
    ];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
