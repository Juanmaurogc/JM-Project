<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Pail\Files;

class partners extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'image_file_id',
        'is_active', 
        'url_link',  
    ];

    public function file(): BelongsTo
    {
        return $this->belongsTo(Files::class, 'file_id');
    }
}
