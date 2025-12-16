<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    protected $fillable = [
        'concert_id',
        'name',
        'price',
        'stock'
    ];

    public function concert()
    {
        return $this->belongsTo(Concert::class);
    }
}
