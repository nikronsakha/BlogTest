<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model implements Authenticatable
{
    use HasFactory , \Illuminate\Auth\Authenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
