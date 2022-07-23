<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Enums\{
    PaymentTypesEnum,
    PaymentMethodsEnum
};

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'type',
        'method',
        'carrier_pay',
        'internal_notes',
        'service_order_id'
    ];

    protected $casts = [
        'type' => PaymentTypesEnum::class,
        'method' => PaymentMethodsEnum::class
    ];

    /**
     * Get service order
     */
    public function serviceOrder()
    {
        return $this->belongsTo(ServiceOrder::class, 'service_order_id', 'id');
    }
}
