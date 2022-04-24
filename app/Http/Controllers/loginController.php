<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\usuarios;
use Session;

class loginController extends Controller
{
    public function login(){
        return view ('sistema.page-login');
    }

    public function valida(Request $request){

    }
}
