<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class ApiController extends Controller
{
    public function user (Request $request){
        $user = User::find($request->id);
    
        return Response::json(array('data' => $user));
        
    }

    public function roles (Request $request){
       
        $role = Role::find($request->id);
    
        return Response::json(array('data' => $role));
        
    }
}
