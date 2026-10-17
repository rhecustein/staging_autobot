<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $guarded = [];

    protected $casts = ['paid_at' => 'datetime'];

    public function getRouteKeyName(): string
    {
        return 'order_id';
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
