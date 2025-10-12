<?php

namespace App\Enums;

enum BlogCategoryEnum: string
{
    case FRONTEND = 'Frontend';
    case BACKEND = 'Backend';
    case DEVOPS = 'Devops';
    case ANDROID = 'Android';
    case IOS = 'IOS';
    case OTHERS = 'Others';
}
