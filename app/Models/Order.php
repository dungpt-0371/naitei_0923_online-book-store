<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'total',
        'status',
    ];

    public function getStatusDisplayAttribute()
    {
        if ($this->status == 0) {
            return __('Pending');
        } elseif ($this->status == 1) {
            return __('Shipped');
        }
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
