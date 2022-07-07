<?php

namespace App\Enums;

enum PaymentTypesEnum: string {
    case COD = 'COD';
    case COP = 'COP';
    case BILLING = 'billing';
}
