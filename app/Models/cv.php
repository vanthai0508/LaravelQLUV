<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class cv extends Model
{
    use HasFactory;
    
    protected $table = 'cv';

    public $atributes = [
        'status' => 1
    ];
    protected $fillable = ['title'];

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

    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user');
    }

    
}
