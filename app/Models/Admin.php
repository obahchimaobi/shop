<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'admin_name',
        'admin_email',
        'admin_password',
    ];

    public function getAuthPassword()
    {
        return $this->admin_password; // Change to your custom password column name
    }
}
