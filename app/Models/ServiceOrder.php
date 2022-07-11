<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'service_orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'load_id',
        'dispatch_instruction',
        'trailer_type',
        'inspection_type',
        'status',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];

    public  function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'service_order_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'service_order_id', 'id');
    }

    public function pickup()
    {
        return $this->hasOne(Pickup::class, 'service_order_id', 'id');
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class, 'service_order_id', 'id');
    }

    public function shipper()
    {
        return $this->hasOne(Shipper::class, 'service_order_id', 'id');
    }
}
