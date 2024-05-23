<?php

namespace App\Http\Controllers\frontend\student;

use App\Http\Controllers\Controller;
use App\Models\Bolumler;
use App\Models\Setting;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public  function index(){
        $bolumler = Bolumler::all();

        $data = Setting::find(1);


        if ($data->status == '')
        {
            return view('frontend.index',compact('bolumler'));
        }else{
            return view('frontend.index-close',compact('data'));
        }


    }

}
