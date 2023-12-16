<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'donator_id',
        'inventory_id',
        'amount',
        'donation_time'
    ];

    public function Users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function Products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
