<?php

namespace App\Enums;

enum RoleEnum: string
{
    case Admin     = 'admin';
    case Employer  = 'employer';
    case Candidate = 'candidate';
}
