<?php
use Illuminate\Support\Facades\Auth;
use App\Models\User;

echo Auth::User()->role;
echo '<br>';
echo Auth::check();
echo '<br>';
 //   echo 'test';

    if( Auth::check() && Auth::user()->role == 0)
        {
            echo "pass";

        }
        else  
        echo "fail";
?>