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


    public function store(Request $request)
    {

        /*$request->validate([

            'bolum_id' => 'required',
            'KVKK' => 'required',
            'name' => 'required',
            'country_number' => 'required',
            'country' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'military_service' => 'required_if:gender,==,male',
            'military_service_certificate' => 'required_if:gender,==,male|file|mimes:pdf,jpg,png,docx,doc|max:2048',
            'identity' => 'required|file|mimes:pdf,jpg,png,docx,doc|max:2048',
            'city' => 'required',
            'town' => 'required',
            'phone_nummber' => 'required',
            'email' => 'required',
            'address' => 'required',
            'university' => 'required',
            'faculty' => 'required',
            'section' => 'required',
            'graduation_score' => 'required',
            'starting_date' => 'required',
            'end_date' => 'required',
            'certificate' => 'required|file|mimes:pdf,jpg,png,docx,doc|max:2048',
            'transcript' => 'required|file|mimes:pdf,jpg,png,docx,doc|max:2048',

            'ales_certificate' => 'required_with:ales|file|mimes:pdf,jpg,png,docx,doc|max:2048',
            'yds_certificate' => 'required_with:yds|file|mimes:pdf,jpg,png,docx,doc|max:2048',



        ]);*/


        dd($request->all());
    }
}
