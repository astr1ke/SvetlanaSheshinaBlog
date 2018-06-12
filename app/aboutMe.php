<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aboutMe extends Model
{
    protected $fillable = [
        'foto','logo','name','title','text',
    ];
    protected $table = 'about';
}
