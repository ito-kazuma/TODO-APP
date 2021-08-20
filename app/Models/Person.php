<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
  public function getGenderTextAttribute()
  {
      switch($this->attributes['gender']){
        case 1:
          return 'male';
        case 2:
          return 'female';
        default:
          return '??';
      }
  }
}
