<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;
    public function creator(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id')->withDefault();
    }
}
