<?php

namespace App\Models;

use App\Models\Trainings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class type_trainings extends Model
{
    protected $fillable = [
        'name',
        'alias'
    ];

    public function trainings(): HasMany
    {
        return $this->hasMany(Trainings::class, 'training_type_id');
    }
}
