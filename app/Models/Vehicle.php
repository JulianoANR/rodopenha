<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'vehicles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vin',
        'make',
        'model',
        'year',
        'color',
        'operable',
        'lot_number',
        'buyer_number',
        'vehicle_type_id',
        'service_order_id'
    ];

    protected $casts = [
        'operable' => 'boolean',
    ];

    public function serviceOrder()
    {
        return $this->belongsTo(ServiceOrder::class, 'service_order_id', 'id');
    }

        public function type()
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id', 'id');
    }
}
