<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class social extends Model
{
    protected $table = 'social';

    protected $fillable = [
      'ok','vk','inst','utub',
    ];
}
