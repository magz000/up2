<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index(){
        return view('app');
//        return view('general.index');
    }



    public function image($id){
        header('Content-Type: image/jpeg');
        if($id == 2){
            echo file_get_contents('/img/test.png');
        }else{
            echo file_get_contents('http://www.quran-institute.org/wp-content/uploads/2017/01/default-profile-bfeeabd02c3b38305b18e4c2345fd54dbbd1a0a7bf403a31f08fca4fada50449.png');
        }
    }
}
