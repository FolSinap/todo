<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function toggleCheck(){
      if ($this->state) {
        return false;
      }else {
        return true;
      }
    }
}
