<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    use HasFactory;

    protected $table = 'shippers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'address',
        'notes',
        'zip'
    ];

    public function serviceOrder()
    {
        return $this->belongsTo(ServiceOrder::class, 'service_order_id', 'id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }
}
