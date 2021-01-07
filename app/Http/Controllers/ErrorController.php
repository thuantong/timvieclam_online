<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function func404(){
        return view('Error.404NotFound');
    }
    //
}
