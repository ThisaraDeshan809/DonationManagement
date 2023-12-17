<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'issuer_id',
        'product_id',
        'amount',
        'issue_date'
    ];

    public function Issuers()
    {
        return $this->belongsTo(Issuer::class, 'issuer_id');
    }

    public function Products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
