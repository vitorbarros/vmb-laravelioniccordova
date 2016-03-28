<?php
namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = array(
        'name'
    );

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}