<?php

namespace App\Models;

use App\Models\enrollments;
use App\Models\Modules;
use App\Models\Speakers;
use App\Models\State_enrollments;
use App\Models\Trainings;
use App\Models\Type_trainings;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrollments extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 
        'training_id', 
        'enrollment_state_id', 
        'is_completed', 
    ];
    
    protected $casts = [
        'is_completed' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function training(): BelongsTo
    {
        return $this->belongsTo(Trainings::class);
    }

    public function enrollmentState(): BelongsTo
    {
        return $this->belongsTo(State_enrollments::class, 'enrollment_state_id');
    }

    public function payments(): BelongsToMany
    {
        return $this->belongsToMany(Payments::class, 'enrollment_payments');
    }
    
    public function certificates(): HasOne
    {
        return $this->hasOne(Certificates::class);
    }
}   
