<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'price'
    ];



    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($course) {
            $course->schedules()->each(function ($schedule) {
                $schedule->delete();
            });
        });
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
