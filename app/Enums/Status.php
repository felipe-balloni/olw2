<?php

namespace App\Enums;

enum status: string
{
    case PENDING = 'P';
    case APROVED = 'A';
    case CANCELED = 'C';
}

