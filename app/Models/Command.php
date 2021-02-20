<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'car_id', 'rental_date', 'recovery_date', 'total_price', 'notes'];

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }

    public function car()
    {
      return $this->belongsTo('App\Models\Car');
    }
}
