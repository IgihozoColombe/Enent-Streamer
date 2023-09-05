<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = ['name', 'subscription_tier', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
