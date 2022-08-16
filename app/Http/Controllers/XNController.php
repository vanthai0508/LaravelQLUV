<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\XNRepository;
use Illuminate\Support\Facades\DB;
use App\Models\cv;
use App\Models\User;
use App\Models\xn;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

class XNController extends Controller
{
    protected $xn;
    public function __construct(XNRepository $xn)
    {
        $this->xn=$xn;
    }


    public function approve($idcv, $iduser)
    {
    //    echo $idcv;
        $cv = cv::find($idcv);


        //echo $cv;

        $user = User::find($iduser);
        $date = date('y-m-d h:i:s');

        $dateInter = strtotime ( '+2 day' , strtotime ( $date) ) ;

        $dateInterview = date("y-m-d h:i:s", $dateInter);
    //    echo $dateInterview;

      
        DB::table('xn')->insert(
            [ 'dateinterview' => $dateInterview, 'id_user' => $iduser, 'id_cv' => $idcv, 'status' => 1 ]
        );

        $this->sendEmail($user->email,"cv/mailapprove");
    }

    public function confirmview()
    {
        $user=Auth::user();
        

        $confirm = DB::table('xn')->where('id_user', $user->id)->where('status', 1)->orderBy('dateInterview', 'desc')->limit(1)->get();
       
       // $confirm=array();
      // echo $confirm->count();
      
    //    if(!$obj->count())
    //    {
    //     echo "rong";
    //    }
    //    else 
    //     echo "co";
      //  echo is_array($confirm);
      //  echo implode($confirm);
        // dd($confirm);
        // dd($confirm);
        // echo $confirm;
        // $confirm=array();
        // echo $confirm;
        if( $confirm->count()==0)
        {
            
           Session::flash('error','CV của bạn chưa được duyệt !!!');

           return view('confirm/confirm');
            
          

        }
        else
        {
           
         
           
            $cv = cv::find($confirm[0]->id_cv);
            return view('confirm/confirm', ['cv' => $cv], ['confirm' => $confirm[0]] );
        }

        
        return redirect('confirm/confirm')->with('confirm', $confirm);
    }

    public function confirm()
    {
        $user=Auth::user();

        if (DB::table('xn')->where('id_user', $user->id)->update(['status' => 0]))
        {
            return view('welcome');
        }
    }
}
