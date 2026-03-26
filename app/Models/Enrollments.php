<?php

namespace App\Models;

use App\Models\Speakers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    // Faz com que o Laravel trate a data como um objeto Carbon automaticamente
    protected $casts = [
        'presentation_date_time' => 'datetime',
    ];

    /**
     * Relacionamento: O Treino pertence a um Tipo (Workshop, Curso, etc).
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(TypeTraining::class, 'training_type_id');
    }

    /**
     * Relacionamento Muitos-para-Muitos com Speakers (Palestrantes).
     * Usa a tabela pivot 'training_speaker' que está no seu diagrama.
     */
    public function speakers(): BelongsToMany
    {
        return $this->belongsToMany(Speakers::class, 'training_speaker');
    }

    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(Module::class, 'module_training')
                    ->withPivot('sort_order'); 
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }
}
