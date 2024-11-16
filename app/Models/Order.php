<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    //  fillable fields
    protected $fillable = [
        'user_id',
        'grand_total',
        'payment_method',
        'payment_status',
        'status',
        'currency',
        'shipping_amount',
        'shipping_method',
        'notes',
    ];

    // relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship with OrderItem model
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    //  relationship with Address model
    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
