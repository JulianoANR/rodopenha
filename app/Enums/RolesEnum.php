<?php

namespace App\Enums;

enum RolesEnum: string {
    case ADMIN = 'administrator';
    case DRIVER = 'driver';
    case SUPERVISOR = 'supervisor';
    case DISPATCHER = 'dispatcher';
}
