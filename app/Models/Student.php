<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Model
{
	use HasFactory, HasApiTokens, Notifiable;

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
