<?php

namespace App\Models;

use App\Models\Enrollments;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
        'user_id',
        'payment_type_id', 
        'payment_state_id',  
        'fiscal_name',
        'tax_number', 
        'document_number', 
        'total_amount',
        'issue_date', 
    ];

    
    
    
    
    public function enrollments()
    {
        return $this->belongsToMany(Enrollments::class, 'enrollment_payments');
    }
}
