<?php

namespace App\Enums;

enum StatusEnum: string {
    case NEW = 'new';
    case ASSIGNED = 'assigned';
    case ACCEPTED = 'accepted';
    case PICKUP_UP = 'picked up';
    case DELIVERED = 'delivered';
}
