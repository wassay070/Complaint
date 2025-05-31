<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'description',
        'urgency',
        'status',
        'complain_by',
        'assign_to'
    ];

    public function complainant()
    {
        return $this->belongsTo(User::class, 'complain_by');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assign_to');
    }
}
