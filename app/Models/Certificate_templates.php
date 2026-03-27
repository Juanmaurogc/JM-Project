<?php

namespace App\Models;

use App\Models\Certificates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Models\Files;

class Certificate_templates extends Model
{
    protected $fillable = [
        'bg_image_file_id',
        'start_date', 
        'end_date',  
    ];

    protected $casts = [ //Casts para garantir que o Laravel trata as datas como objetos Carbon. Isso permite fazer: $template->start_date->format('d/m/Y')
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    public function file(): BelongsTo
    {
        return $this->belongsTo(Files::class, 'bg_image_file_id');
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(Certificates::class, 'template_id');
    }
}
