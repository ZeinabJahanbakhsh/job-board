<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case IsAdmin     = 'is_admin';
    case IsEmployer  = 'is_employer';
    case IsCandidate = 'is_candidate';
}
