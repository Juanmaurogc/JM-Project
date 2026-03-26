<?php

namespace App\Models;

use App\Models\Banners;
use App\Models\Certificate_templates;
use App\Models\Partners;
use App\Models\Speakers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class files extends Model
{
    protected $fillable = [
        'file_path', 
        'original_file_name', 
        'hash', 
        'mime_type', 
        'size', 
    ];

    public function getFullUrlAttribute(): string
    {
        return Storage::url($this->file_path);
    }

    public function banners(): HasMany
    {
        return $this->hasMany(Banners::class, 'file_id');
    }

    public function partners(): HasMany
    {
        return $this->hasMany(Partners::class, 'file_id');
    }

    public function speakers(): HasMany
    {
        return $this->hasMany(Speakers::class, 'photo_file_id');
    }

    public function certificate(): HasMany
    {
        return $this->hasMany(Certificates::class, 'file_id');
    }

    public function certificateTemplates(): HasMany
    {
        return $this->hasMany(Certificate_templates::class, 'file_id');
    }
}
