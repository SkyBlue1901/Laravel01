<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    function aboutme(){
        return response("This is about page");
    }

    function downloadInvoice($id){
        return response("Downloading Invoice with ID: {$id}" . $id);
    }

    function downloadInvoiceType($invoiceId, $type="pdf"){
        return response("Downloading {$type} Invoice with ID: {$invoiceId}");
    }

    function invoice(Request $request, $invoiceId){
        if($request->has('download')){
            $type = $request->input('download');
            $printType = $request->input('print');
            if($printType=='color'){
                return response("Downloading colored {$type} Invoice with ID: {$invoiceId}");
            }
            if($printType=='black'){
                return response("Downloading black and white {$type} Invoice with ID: {$invoiceId}");
            };
            return response("Downloading {$type} Invoice with ID: {$invoiceId}");
        }

        if($request->has('email')){
            $email = $request->input('email');
            if($email==1){
                return response("Sending Invoice with ID: {$invoiceId}");
            };
        }
        return response("Displaying Invoice with ID: {$invoiceId}");
    }

    function requestExample(Request $request){
        $greetings = $request->input('greetings', "Hello2");
        return response("Greetings: {$greetings}");
    }
    function index(){
        //return response($this->tasks);
        //return response()->json($this->tasks);
    }
}

