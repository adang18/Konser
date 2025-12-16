<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected $fillable = ['title', 'artist', 'date', 'location', 'description'];

    public function ticketCategories()
    {
        return $this->hasMany(TicketCategory::class);
    }


}

