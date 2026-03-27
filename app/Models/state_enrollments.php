<?php

namespace App\Models;

use App\Models\Enrollments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State_enrollments extends Model
{
    protected $fillable = [
        'name',
        'alias'
    ];

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollments::class, 'enrollment_state_id');
    }
}
