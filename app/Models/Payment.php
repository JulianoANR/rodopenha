<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Enums\{
    PaymentTypesEnum,
    PaymentMethodsEnum
};

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'payments';

    protected $fillable = [
        'type',
        'notes',
        'method',
        'carrier_pay',
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
