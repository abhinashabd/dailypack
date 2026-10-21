<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_name',
        'customer_name',
        'customer_phone',
        'customer_email',
        'quantity',
        'message',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
