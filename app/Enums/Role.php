<?php

namespace App\Enums;

enum Role: int
{
    case GUEST = 0;
    case ADMIN = 1;
    case STUDENT = 2;
    case TEACHER = 3;
};