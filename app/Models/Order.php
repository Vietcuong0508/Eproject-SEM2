<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'shipName',
        'shipAddress',
        'shipPhone',
        'status',
        'email',
        'note',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'orderId');
    }
}
