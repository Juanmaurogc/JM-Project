<?php

namespace App\Models;

use App\Models\Payments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type_payments extends Model
{
    protected $fillable = [
        'name',
        'alias'
    ];

    public function payments(): HasMany
    {
        return $this->hasMany(Payments::class, 'payment_type_id');
    }
}
