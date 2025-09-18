<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstructorPayoutInformation extends Model
{
    protected $fillable = [
        'instructor_id',
        'gateway',
        'information'
    ];
}
