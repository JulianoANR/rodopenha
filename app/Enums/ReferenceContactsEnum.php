<?php

namespace App\Enums;

enum ReferenceContactsEnum: string {
    case PICKUP = 'pickup';
    case DELIVERY = 'delivery';
    case SHIPPER = 'shipper';
}
