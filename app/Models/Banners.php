<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Pail\Files;

class Banners extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'image_file_id',
        'start_date', 
        'end_date',  
    ];

    public function file(): BelongsTo
    {
        return $this->belongsTo(Files::class, 'file_id');
    }
}
