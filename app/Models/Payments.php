<?php

namespace App\Models;

use App\Models\Enrollments;
use App\Models\State_payments;
use App\Models\Type_payments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payments extends Model
{
    use SoftDeletes;

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

    public function paymentState()
    {
        return $this->belongsTo(State_payments::class, 'payment_state_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function paymentType()
    {
        return $this->belongsTo(Type_payments::class, 'payment_type_id');
    }    
    
    public function enrollments()
    {
        return $this->belongsToMany(Enrollments::class, 'enrollment_payments');
    }
}
