<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aboutMePage extends Model
{
    protected $table = 'about_me';

    protected $fillable = [
        'text',
    ];
}
