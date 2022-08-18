<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    //

   public function changeLanguage($language)
   {
        //  echo $langcode;
      //     echo "day ne";
      //   // echo $lang;
      //    //  App::setLocale($lang);
      //   // $locale = App::currentLocale();
      //      if(App::setLocale('vi'))
      //      {
      //         return redirect('/');
      //      }
      //      else if(App::setLocale('en'))
      //      {
      //       return redirect('/');
      //      }
           
      //     // session()->put("lang_code",$langcode);
      //      return redirect()->back();

    //  App::setLocale($lang);
    //  session()->put("lang_code",$lang);

      Session::put('website_language', $language);

     

      return view('welcome');
   } 
}
