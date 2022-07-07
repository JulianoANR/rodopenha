<?php

namespace App\Enums;

enum PaymentMethodsEnum: string {
    case CASH = 'cash';
    case BUSINESS_CHECK = 'business check';
    case CASHIERS_CHECK = 'cashier check';
}
