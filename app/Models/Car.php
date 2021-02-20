<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['command_id', 'brand', 'model', 'type', 'price', 'image', 'available'];

    public function command()
    {
      return $this->hasOne('App\Models\Command');
    }

}
