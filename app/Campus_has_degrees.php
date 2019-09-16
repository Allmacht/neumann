<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus_has_degrees extends Model
{
    public function degree(){
        return $this->belongsTo(Degree::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
