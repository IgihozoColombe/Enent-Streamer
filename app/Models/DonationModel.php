<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = ['amount', 'currency', 'donation_message', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
