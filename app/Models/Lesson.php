<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'duration_time',
        'lesson_video_path'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    protected function lessonVideoPath(): Attribute
    {
        $path = Storage::disk('s3')->put('videos/', $this->lesson->lesson_video_path);
        $path = Storage::disk('s3')->url($path);
        return Attribute::make(
            get: fn ($value) => $path,
        );
    }
}
