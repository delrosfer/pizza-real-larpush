<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'address', 'size', 'toppings', 'instructions', 'status_id'];

    // Get the customer that placed the order
    public function customer() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    // Get the status of the order
    public function status() {
        return $this->belongsTo('App\Models\Status');
    }
}
