<?php

namespace App\Models;

use App\Enums\ReferenceContactsEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ref',
        'name',
        'email',
        'phone',
        'type',
        'company',
        'working_from',
        'working_to'
    ];

    protected $casts = [
        'ref' => ReferenceContactsEnum::class,
    ];

    /**
     * RELATIONSHIP RECOMMENDED
     */
    public function reference()
    {
        switch ($this->ref) {
            case ReferenceContactsEnum::PICKUP:
                return $this->hasOne(Pickup::class);
                break;

            case ReferenceContactsEnum::DELIVERY:
                return $this->hasOne(Delivery::class);
                break;

            case ReferenceContactsEnum::SHIPPER:
                return $this->hasOne(Shipper::class);
                break;
        }
    }

    /**
     * WARNING
     */
    public function pickup()
    {
        return $this->hasOne(Pickup::class, 'contact_id');
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class, 'contact_id');
    }

    public function shipper()
    {
        return $this->hasOne(Shipper::class, 'contact_id');
    }
}
