<?php

declare(strict_types=1);

namespace App;

enum UserType: string
{
    case EMPLOYEE = 'employee';
    case DEALER = 'dealer';
}
