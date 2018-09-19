<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Department extends Model
{
  public static function departments()
  {
    $departments = Department::orderBy('short_name')->get();
    return $departments;
  }
}
