<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplyRequest;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use App\Models\cv;
use PhpParser\Node\Expr\FuncCall;
use App\Repositories\Eloquent\CVRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

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
        DB::table('cv')->insert(
            ['name' => $request->name, 'position' => $request->position, 'file' => null, 'phone' => $request->phone, 'id_user' =>$id, 'status' =>1 ]
        );
        // Insert nhiều bản ghi
       
        

     //   return view('user/create');
        // if($this->cv->create($request))
        // {
        //     Session::flash('success', 'thanh cong ');
        // }
        // else 
        //     Session::flash('error', 'that bai roi');
    }

    public function reject($id)
    {
        if($this->cv->delete($id))
        {
            Session::flash('success','xoa cv thanh cong');
        }
        else Session::flash('error','xoa cv that bai');

        return redirect('cv/list');
    }

    public function sendEmail()
    {
        $to_email = "tranthai22756@gmail.com";

        Mail::to($to_email)->send(new SendEmail);

        return "<p> Thành công! Email của bạn đã được gửi</p>";
    }
}