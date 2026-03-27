<?php

namespace App\Models;

use App\Models\Files;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partners extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'image_file_id',
        'is_active', 
        'url_link',  
    ];

    public function file(): BelongsTo
    {
        return $this->belongsTo(Files::class, 'image_file_id');
    }
}

