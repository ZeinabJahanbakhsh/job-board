<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case IsAdmin     = 'IS_ADMIN';
    case IsEmployer  = 'IS_EMPLOYER';
    case IsCandidate = 'IS_CANDIDATE';
}
