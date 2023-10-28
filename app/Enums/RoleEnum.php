<?php

namespace App\Enums;

enum RoleEnum: string
{
    case Admin     = 'ADMIN';
    case Employer  = 'EMPLOYER';
    case Candidate = 'CANDIDATE';
}
