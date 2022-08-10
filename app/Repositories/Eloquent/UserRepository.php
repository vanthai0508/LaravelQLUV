<?php
namespace App\Repositories\Eloquent;

use App\Models\user2;
use App\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    public function getModel()
    {
        return user2::class;
    }
}



?>