<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'concert_id',
        'ticket_category_id',
        'buyer_name',
        'buyer_email',
        'buyer_phone',
        'quantity',
        'total_price',
        'status',
        'payment_proof',
        'payment_method', 
        'ticket_code',  
    ];

    public function concert()
    {
        return $this->belongsTo(Concert::class);
    }

    public function ticketCategory()
    {
        return $this->belongsTo(TicketCategory::class);
    }
}
