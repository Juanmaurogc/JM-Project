<?php

namespace App\Models;

use App\Models\Trainings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Models\Files;

class Speakers extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'photo_file_id',
        'name',
        'title',
        'bio',
    ];

    public function trainings(): BelongsToMany
    {
        return $this->belongsToMany(Trainings::class, 'training_speaker');
    }

     public function file(): BelongsTo
    {
        return $this->belongsTo(Files::class, 'photo_file_id');
    }
}
