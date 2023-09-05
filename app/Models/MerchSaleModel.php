<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchSale extends Model
{
    protected $fillable = ['item_name', 'amount', 'price', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
