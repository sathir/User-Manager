<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function run_test(Request $request){
        dd($request->all());
    }
}
