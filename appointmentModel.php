<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointmentModel extends Model
{
    use HasFactory;
    protected $table = 'appointment';
    protected $fillable = ['name','email','pref_date','pref_time','appointment_for'];
}
