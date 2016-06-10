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
        'user_deliverymen_id',
        'total',
        'status'
    );

    public function cupoms()
    {
        return $this->belongsTo(Cupom::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function deliveryMen()
    {
        return $this->belongsTo(User::class, 'user_deliverymen_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
