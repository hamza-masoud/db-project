<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Tutor extends Authenticatable
{
	use HasFactory, HasApiTokens, Notifiable;

	protected $hidden = [
		'password',
	];
    protected $fillable = [
        'name',
        'phone',
        'password',
    ];
}
