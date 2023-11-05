<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case is_admin     = 'is_admin';
    case is_employer  = 'is_employer';
    case is_candidate = 'is_candidate';
}
