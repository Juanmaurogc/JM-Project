<?php

namespace App\Models;

use App\Models\Enrollments;
use App\Models\Modules;
use App\Models\Speakers;
use App\Models\Type_trainings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class enrollments extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 
        'description', 
        'training_type_id', 
        'presentation_date_time', 
        'min_enrollments', 
        'max_enrollments'
    ];

    protected $casts = [
        'presentation_date_time' => 'datetime',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type_trainings::class, 'training_type_id');
    }

    public function speakers(): BelongsToMany
    {
        return $this->belongsToMany(Speakers::class, 'training_speaker');
    }

    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(Modules::class, 'module_training')->withPivot('sort_order'); 
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollments::class);
    }

    public function payments()
    {
        return $this->belongsToMany(Payment::class, 'enrollment_payments');
    }
}
