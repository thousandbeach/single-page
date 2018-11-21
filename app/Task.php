<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Task extends Model
{
    //
    protected  $fillable = ['name', 'body', 'user_id',];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    
}
