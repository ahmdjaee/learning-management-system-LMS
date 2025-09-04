<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseChapter extends Model
{
    /**
     * Get all of the lessons for the CourseChapter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessons(): HasMany
    {
        return $this->hasMany(CourseChapterLesson::class, 'chapter_id', 'id')->orderBy('order');
    }
}
