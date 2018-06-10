<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
   protected $fillable = [
       'title','text','categorie_id','image','user_id',
   ];

   public function user(){
       return $this->belongsTo(user::class);
   }

   public  function categorie(){
       return $this->belongsTo(categorie::class);
   }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
