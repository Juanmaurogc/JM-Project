<?php

namespace App\Models;

use App\Models\Payments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class state_payments extends Model
{
    protected $fillable = [
        'name',
        'alias'
    ];

    public function payment(): HasMany
    {
        return $this->hasMany(Payments::class, 'payment_state_id');
    }
}
