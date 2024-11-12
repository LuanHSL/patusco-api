<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'animal_name',
        'animal_type',
        'animal_age',
        'prognostic',
        'period',
        'date',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
