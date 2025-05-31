<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles; // Add this trait

    protected $fillable = ['name', 'email', 'password', 'phone', 'role', 'plain_password'];

    protected $hidden = ['password'];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function getDisplayName()
    {
        return $this->name ?? 'Guest';
    }

    public function assignedComplaints()
    {
        return $this->hasMany(Complaint::class, 'assign_to');
    }


}
