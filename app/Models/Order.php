<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function creator(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id')->withDefault();
    }
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
