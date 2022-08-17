

<?php
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;


// echo Auth::User()->role;
// echo '<br>';
// echo Auth::check();
// echo '<br>';
//  //   echo 'test';

//     if( Auth::check() && Auth::user()->role == 0)
//         {
//             echo "pass";

//         }
//         else  
//         echo "fail";

   // echo $lang;
  //  echo $lang;
  //  echo "ở đây";
   // App::setLocale($lang);

   // $locale = App::currentLocale();
    // if(App::isLocal('en'))
    // {
    //     echo 'en';
    // }
    
    ?>
    {{ trans('message.welcome') }};
    <br>

    {{ trans('message.hello', ['name' => 'My Name']) }}

    <a href="{{ route('lang',['lang' => 'vi']) }}">VI</a>

<a href="{{ route('lang',['lang' => 'en' ]) }}">EN</a>

