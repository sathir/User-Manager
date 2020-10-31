<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function CreateNewUser (Request $request){

        $validatedData = validator()->make($request->all(),[
            'email' => 'required|email|max:15',
            'password' => 'required|min:8|confirmed',
        ]);

        if($validatedData->fails()){

            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        else{
            $user = new User();
            $user->name = $request->get('username');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));

            $user->save();
            return redirect()->back()->with([
                'success' => true,
                'message' => 'User has been saved.'
            ]);
        }
        
    }

    public function EditUser (User $user){
        return view('EditUser')->with([
            'user' => $user
        ]);       
    }

    public function UpdateRole(Request $request){
        
        $user=User::find($request->id);
        $user->role = $request->role_id;
        $user->update();
    
        // Role::create([  
        //     'email'=>$user->email,
        //     'type'=>$request->role_id
        // ]);
    
        return response()->json("success");

    }

    public function DeleteUser(Request $request){

        dd($request->all());

        $user = User::find($request->id);
       

        if ($request != NULL){
           // $user->delete();
        }
    
        return response()->json("success");
    }
}
