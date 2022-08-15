<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplyRequest;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Repositories\Eloquent\CVRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CVController extends Controller
{

    protected $cv;
    public function __construct(CVRepository $cv)
    {
        $this->cv=$cv;
    }

    public function list()
    {
        $cvs = $this->cv->list();
        return view('cv/list')->with('cvs',$cvs);
    }
    public function apply()
    {
        
    }

    public function applyView()
    {
        return view('cv/create');
    }

    public function create(ApplyRequest $request)
    {   
        $user=Auth::user();

        $id=$user->id;
        echo $id;

     //   return view('user/create');
        if($this->cv->create($request))
        {
            Session::flash('success', 'thanh cong ');
        }
        else 
            Session::flash('error', 'that bai roi');
    }
}