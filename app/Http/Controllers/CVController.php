<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Repositories\Eloquent\CVRepository;

class CVController extends Controller
{

    protected $cv;
    public function __construct(CVRepository $cv)
    {
        $this->cv=$cv;
    }

    public function apply()
    {
        
    }
}
