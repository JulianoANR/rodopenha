<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'deliveries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'address',
        'notes',
        'zip',
        'date',
        'signature_required'
    ];

    protected $casts = [
        'date' => 'date:Y-m-d',
        'signature_required' => 'boolean'
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
