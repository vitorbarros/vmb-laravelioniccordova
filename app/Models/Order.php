<?php
namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = array(
        'client_id',
        'user_deliveryman_id',
        'total',
        'status'
    );

    public function itens()
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