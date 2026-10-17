<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected $casts = ['features' => 'array'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function isSubscription(): bool
    {
        return $this->type === 'subscription';
    }
}
