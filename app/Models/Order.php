<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'products', 'status', 'date', 'total'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // COnvierte el JSON de productos a un array asociativo
    public function getProductsAttribute($value)
    {
        return json_decode($value, true);
    }

    // Convierte el array asociativo de productos a un JSON
    public function setProductsAttribute($value)
    {
        $this->attributes['products'] = json_encode($value);
    }
}
