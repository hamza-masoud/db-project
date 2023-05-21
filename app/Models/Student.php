<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	use HasFactory;

	protected $hidden = [
		'password',
	];

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }

    public function lectures()
    {
        return $this->belongsToMany(Lecture::class)->withPivot('presence')->withTimestamps();
    }
}
