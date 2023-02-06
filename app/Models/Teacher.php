<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;

class Teacher extends User
{
    use HasFactory;

    protected $table = 'users'; 

    public static function boot()
    {
        parent::boot();
 
        static::addGlobalScope(function (Builder $query) {
            $query->where('role', 3);
        });
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
