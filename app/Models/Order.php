<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = array(
        'client_id',
        'user_deliveryman_id',
        'total',
        'status'
    );

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function deliveryMan()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
