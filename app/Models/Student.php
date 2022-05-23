<?php

namespace App\Models;

use Carbon\Carbon;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    public function getDobAttribute($value)
    {
        return Carbon::parse($value)->format('M d, Y');
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
