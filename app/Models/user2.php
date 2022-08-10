<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user2 extends Model
{
    use HasFactory;
    protected $table = 'user';

    protected $fillable = [
        'id_user',
        'username',
        'password',
        'email',
        'role'
    ];
}
