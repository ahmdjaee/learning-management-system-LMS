<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model
{
    /**
     * Get the instructor associated with the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function instructor(): HasOne
    {
        return $this->hasOne(User::class,  'id', 'instructor_id');
    }
}
