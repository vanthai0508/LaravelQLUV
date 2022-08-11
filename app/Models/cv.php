<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cv extends Model
{
    use HasFactory;
    
    protected $table = 'cv';

    protected $fillabel = [
        'name',
        'position',
        'dateapply',
        'phone',
        'file',
        'id_user',
        'id',
        'status'
    ];

    // public function user(){
    //     $this->belongsTo('user','id_user');
    // }
}
