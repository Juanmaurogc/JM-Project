<?php

namespace App\Models;

use App\Models\Trainings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modules extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'training_id',
        'name', 
        'date_time', 
        'sort_order', 
        'topics', 
    ];

    protected $casts = [
        'date_time' => 'datetime', 
    ];

    public function trainings():BelongsToMany
    {
        return $this->belongsToMany(Trainings::class, 'module_training');
    }
}
