<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    /**
     * Get the category associated with the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category(): HasOne
    {
        return $this->hasOne(CourseCategory::class, 'id', 'category_id');
    }

    /**
     * Get the level associated with the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function level(): HasOne
    {
        return $this->hasOne(CourseLevel::class, 'id', 'course_level_id');
    }

    /**
     * Get the language associated with the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function language(): HasOne
    {
        return $this->hasOne(CourseLanguage::class, 'id', 'course_language_id');
    }

    /**
     * Get all of the chapters for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chapters(): HasMany
    {
        return $this->hasMany(CourseChapter::class, 'course_id', 'id')->orderBy('order');
    }
}
