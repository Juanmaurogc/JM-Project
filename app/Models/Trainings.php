<?php

namespace App\Models;

use App\Models\Enrollments;
use App\Models\Modules;
use App\Models\Speakers;
use App\Models\Type_trainings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainings extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'training_type_id',
        'title',
        'description',
        'presentation_date_time',
        'min_enrollments',
        'max_enrollments',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollments::class, 'training_id');
    }

    public function trainingType()
    {
        return $this->belongsTo(Type_trainings::class, 'training_type_id');
    }

    public function speakers()
    {
        return $this->belongsToMany(Speakers::class, 'training_speaker');
    }
    
    public function modules()
    {
        return $this->belongsToMany(Modules::class, 'module_training');
    }
}
