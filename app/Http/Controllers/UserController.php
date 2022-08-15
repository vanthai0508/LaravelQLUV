<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user= $user;
    }
    public function list()
    {
        $users = $this->user->list();

      //  return view('user/list')->with('users',$users);
    }

    public function createView()
    {
        return view('user/create');
    }

    public function create(Request $request)
    {
        if($this->user->create($request))
        {
            Session::flash('success','thanh cong');
        }
        else 
            Session::flash('error','that bai');
        
    }

    public function loginView()
    {
        return view('user/login');
    }

    public function login(LoginRequest $request)
    {
        // $users=User::get();

        // echo $users;
        $username = $request->username;
        $password = $request->password;
        // {
            if(Auth::attempt(['username' => $username, 'password' => $password]))
            {
                return redirect('cv/create');
            }
            else
            {
                return redirect()->back()->with('status', 'Username hoac Password khong dung');
            
            }
        // if( (Auth) ==true)
        // {
        //     return redirect('user/create');
        // }
        // else
        // {
        //     return redirect()->back()->with('status', 'Username hoac Password khong dung'.$request->password);
            
        // }
    }
}