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
use App\Models\User;

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

        $cvs=DB::table('cv')->Where('status', '1')->get();
       
        return view('cv/list')->with('cvs',$cvs);
    }
    public function apply()
    {
        
    }

    public function applyView()
    {
        return view('cv/create');
    }
    public function storeImage(ApplyRequest $request) {
        $path = $request->file('file')->store('public/cv');
        return substr($path, strlen('public/'));
      }

    public function create(ApplyRequest $request)
    {   
        $user=Auth::user();

        if ($request->hasFile('file')) {
            $file = $request->file;

            //Lấy Tên files
         //   echo 'Tên Files: ' . $file->getClientOriginalName();
         //   echo '<br/>';

            //Lấy Đuôi File
            // echo 'Đuôi file: ' . $file->getClientOriginalExtension();
            // echo '<br/>';

            //Lấy đường dẫn tạm thời của file
          //  echo 'Đường dẫn tạm: ' . $file->getRealPath();
          //  echo '<br/>';

            //Lấy kích cỡ của file đơn vị tính theo bytes
          //  echo 'Kích cỡ file: ' . $file->getSize();
           // echo '<br/>';

            //Lấy kiểu file
         //   echo 'Kiểu files: ' . $file->getMimeType();

            $file->move('cv', $file->getClientOriginalName());

            $link = $file->getClientOriginalName();

         $id=$user->id;
        // echo $request->file('file')->store('public/profile');
        // $path = $request->file('file')->store('public/profile');
        // $link = substr($path, strlen('public/'));
        DB::table('cv')->insert(
            ['name' => $request->name, 'position' => $request->position, 'created_at' => date('Y-m-d h:i:s'), 'file' => null, 'phone' => $request->phone, 'file' => $link, 'id_user' =>$id, 'status' =>1 ]
        );
    //    return redirect('cv/list');
        // Insert nhiều bản ghi
       
        

     //   return view('user/create');
        // if($this->cv->create($request))
        // {
        //     Session::flash('success', 'thanh cong ');
        // }
        // else 
        //     Session::flash('error', 'that bai roi');
        }
    }

    public function reject($id)
    {
        
        $result = $this->cv->find($id);

        //    echo $result->id_user;

        $user = User::find($result->id_user);

    //    echo $user->email;

         $this->sendEmail($user->email,"cv/mail");

         
         if(DB::table('cv')->where('id', $id)->update(['status' => 0]))
        {
            Session::flash('success','Reject thanh cong');
        }
        else Session::flash('error','Reject that bai');

         return redirect('cv/list');
    }

    // public function sendEmail($mail)
    // {
    //     $to_email = $mail;

    //     Mail::to($to_email)->send(new SendEmail);

    //     return "<p> Thành công! Email của bạn đã được gửi</p>";
    // }
}