<?php

namespace App\Models;

use App\Models\Enrollments;
use App\Models\Certificate_templates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Models\Files;

class Certificates extends Model
{
    protected $fillable = [
        'enrollment_id',
        'template_id', 
        'file_id',  
        'issue_date',  
    ];

    protected $casts = [ //Casts para garantir que o Laravel trata as datas como objetos Carbon. Isso permite fazer: $template->start_date->format('d/m/Y')
        'issue_date' => 'date',
    ];

    public function template(): BelongsTo
    {
        return $this->belongsTo(Certificate_templates::class, 'template_id');
    }

    public function file(): BelongsTo
    {
        return $this->belongsTo(Files::class, 'file_id');
    }

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollments::class, 'enrollment_id');
    }
}
