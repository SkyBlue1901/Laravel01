<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use PhpParser\Builder\Param;

class DemoController extends Controller
{
    function demoResponse(){
        // return response ("Welcome to the Laravel");
        //return "Hello";
        //return 123;
        //return true;
        //return["a","B","C","D","E"];
        //return array(["a"=>"p","B"=>"p","C"=>"p","D"=>"p","E"=>"p"]);
        //return response (["a"=>"p","B"=>"p","C"=>"p","D"=>"p","E"=>"p"],201);
        //return redirect('/');
        //return response()->file("image.jpg");
        // return response()->download("image.jpg");
        //return View("demo");
        
    }

    function demoRequest(Request $request){
        //return "hello";
        // $qry = $request->query();
        // return $qry;
        
        
        // $name = $request->name;
        // $city= $request->city;
        // return $name . " " . $city;

        // $jsonBody=$request->input();
        // return $jsonBody;

        // $head=$request->header();
        // return $head;

        //$formData=$request->input();
        // return $formData;

        //$key1=$request->input("key1");
        // $key1=$request->input("key2");
        // return $key1;

        // $myFile=$request->file("myFile");
        // $myFile->move(public_path('upload'),$myFile->getClientOriginalName());
        // return "Success";

        $ip=$request->ip();
        return $ip;
    }
}
