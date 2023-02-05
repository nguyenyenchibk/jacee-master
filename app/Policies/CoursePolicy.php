<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Course $course)
    {
        return $user->is($course->user);
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Course $course)
    {
        return $user->is($course->user);
    }

    public function delete(User $user, Course $course)
    {
        return $user->is($course->user);
    }
}
