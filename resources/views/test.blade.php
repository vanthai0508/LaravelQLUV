<?php
use Illuminate\Support\Facades\Auth;
    $user=Auth::user();
    echo 'test';

    echo $user->id;
    
?>