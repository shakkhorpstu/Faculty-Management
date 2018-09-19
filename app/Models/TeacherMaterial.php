<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherMaterial extends Model
{
  public function course()
  {
    return $this->belongsTo(Course::class);
  }
}
