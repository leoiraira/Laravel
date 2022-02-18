<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{
    public function create(){
        return view( view: 'users.create');
} 
    }
    

