<?php

namespace App\Enum;

enum EmployeeStatusEnum:string
{
    //
    case ACTIVE = 'active';
    case AWOL ='awol';
    case INACTIVE = 'inactive';
}
