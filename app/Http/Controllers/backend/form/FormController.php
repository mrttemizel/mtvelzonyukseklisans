<?php

namespace App\Http\Controllers\backend\form;

use App\Http\Controllers\Controller;
use App\Mail\NewApplicationMail;
use App\Mail\ReceivedApplicationMail;
use App\Models\Student;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use \ZipArchive;
use File;


class FormController extends Controller
{

    public function NotificationMessage($message, $alertType) {
        $notification = array(
            'message' => $message,
            'alert-type' => $alertType
        );
        return $notification;
    }

    public  function index()
    {
        $data = Student::all();
        return view('backend.form.index',compact('data'));

    }

    public  function  store(Request $request)
    {
        $request->validate([
            'bolum_id' => 'required',
            'KVKK' => 'required',
            'name' => 'required',
            'country_number' => 'required',
            'country' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'military_service' => 'required_if:gender,==,male',

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

            'military_service_certificate' => 'required_if:gender,==,male|file|mimes:pdf|max:2048',
            'identity' => 'required|file|mimes:pdf|max:2048',
            'certificate' => 'required|file|mimes:pdf|max:2048',
            'transcript' => 'required|file|mimes:pdf|max:2048',
            'ales_certificate' => 'required_with:ales|file|mimes:pdf|max:2048',
            'yds_certificate' => 'required_with:yds|file|mimes:pdf|max:2048',
        ]);


        $data = new Student();

        $data -> bolum_id = $request->input('bolum_id');
        $data -> name = $request->input('name');
        $data -> country_number = $request->input('country_number');
        $data -> country = $request->input('country');
        $data -> place_of_birth = $request->input('place_of_birth');
        $data -> date_of_birth = $request->input('date_of_birth');
        $data -> gender = $request->input('gender');
        $data -> military_service = $request->input('military_service');
        $data -> city = $request->input('city');
        $data -> town = $request->input('town');
        $data -> phone_nummber = $request->input('phone_nummber');
        $data -> email = $request->input('email');
        $data -> address = $request->input('address');
        $data -> university = $request->input('university');
        $data -> faculty = $request->input('faculty');
        $data -> section = $request->input('section');
        $data -> graduation_score = $request->input('graduation_score');
        $data -> starting_date = $request->input('starting_date');
        $data -> end_date = $request->input('end_date');
        $data -> ales = $request->input('ales');
        $data -> yds = $request->input('yds');


        if($request->hasFile('military_service_certificate')) {
            $military_service_certificate = $request->file('military_service_certificate');
            $military_service_certificate_name = $request->input('name') . '-' . 'askerlik' . '-' . time() . '-' . uniqid() . '.' . $military_service_certificate->getClientOriginalExtension();
            $military_service_certificate->move(public_path('form'), $military_service_certificate_name);
            $data->military_service_certificate = $military_service_certificate_name;
        }

        if($request->hasFile('identity')) {
            $identity = $request->file('identity');
            $identity_name = $request->input('name') . '-' . 'Kimlik' . '-' . time() . '-' . uniqid() . '.' . $identity->getClientOriginalExtension();
            $identity->move(public_path('form'), $identity_name);
            $data->identity = $identity_name;
        }

        if($request->hasFile('certificate')) {
            $certificate = $request->file('certificate');
            $certificate_name = $request->input('name') . '-' . 'Diploma' . '-' . time() . '-' . uniqid() . '.' . $certificate->getClientOriginalExtension();
            $certificate->move(public_path('form'), $certificate_name);
            $data->certificate = $certificate_name;
        }

        if($request->hasFile('transcript')) {
            $transcript = $request->file('transcript');
            $transcript_name = $request->input('name') . '-' . 'Transcript' . '-' . time() . '-' . uniqid() . '.' . $transcript->getClientOriginalExtension();
            $transcript->move(public_path('form'), $transcript_name);
            $data->transcript = $transcript_name;
        }

        if($request->hasFile('ales_certificate')) {
            $ales_certificate = $request->file('ales_certificate');
            $ales_certificate_name = $request->input('name') . '-' . 'Ales' . '-' . time() . '-' . uniqid() . '.' . $ales_certificate->getClientOriginalExtension();
            $ales_certificate->move(public_path('form'), $ales_certificate_name);
            $data->ales_certificate = $ales_certificate_name;
        }

        if($request->hasFile('yds_certificate')) {
            $yds_certificate = $request->file('yds_certificate');
            $yds_certificate_name = $request->input('name') . '-' . 'Yds' . '-' . time() . '-' . uniqid() . '.' . $yds_certificate->getClientOriginalExtension();
            $yds_certificate->move(public_path('form'), $yds_certificate_name);
            $data->yds_certificate = $yds_certificate_name;
        }

        $query = $data->save();

        // ok
        Mail::to($request->input('email'))->queue(new ReceivedApplicationMail(
            trans('mail.titles.application'),
            app()->getLocale()
        ));

        Mail::to('oguz.topcu@antalya.edu.tr')->queue(new NewApplicationMail());

        if (!$query) {
            return back()->with($this->NotificationMessage((App()->getLocale()=='tr') ? 'Başvurunuz Hatalı' : 'Application Error','error'));
        } else {
            return redirect()->route('student.index',['locale' => app()->getLocale()])->with($this->NotificationMessage((App()->getLocale()=='tr') ? 'Başvurunuz Başarılı Bir Şekilde Alındı' : 'Application Successful','success'));
        }
    }

    public function see($id)
    {

        $student = Student::where('id', $id)->first();

        if (!$student) {

            abort(404, 'Öğrenci bulunamadı.');
        }


        return view('backend.form.see', [
            'datas' => $student,
        ]);
    }




    public function downloadZip($id)
    {
        try {
            // Öğrenci verisini bul
            $data = Student::find($id);

            if (!$data) {
                return response()->json(['error' => 'Öğrenci bulunamadı'], 404);
            }

            // Dosya yollarını belirle
            $files = [
                $data->ales_certificate ? public_path('form/' . $data->ales_certificate) : null,
                $data->yds_certificate ? public_path('form/' . $data->yds_certificate) : null,
                $data->transcript ? public_path('form/' . $data->transcript) : null,
                $data->certificate ? public_path('form/' . $data->certificate) : null,
                $data->identity ? public_path('form/' . $data->identity) : null,
                $data->military_service_certificate ? public_path('form/' . $data->military_service_certificate) : null,
            ];

            // Geçici dizin oluştur ve kontrol et
            $tempDir = public_path('zip');


            if (!is_writable($tempDir)) {
                return response()->json(['error' => 'Geçici dizine yazma izni yok'], 500);
            }


            // Zip dosya adı ve yolunu belirle
            $zipFileName = Str::slug($data->name) . '.zip';
            $zipFilePath = $tempDir . '/' . $zipFileName;



            // ZipArchive nesnesi oluştur
            $zip = new ZipArchive();

            if (!$zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
                return response()->json(['error' => 'Zip dosyası oluşturulamadı'], 500);
            }


            // Dosyaları zip dosyasına ekle
            foreach ($files as $file) {
                if (file_exists($file) && filesize($file) > 0) {
                    $zip->addFile($file, basename($file));
                } else {
                    // Handle case where file is missing or empty
                    \Log::warning('Eksik veya boş dosya: ' . $file);
                }
            }


            // Zip dosyasını kapat
            if (!$zip->close()) {
                return response()->json(['error' => 'Zip dosyası kapatılamadı'], 500);
            }

            // Zip dosyasını indirme işlemi
            return response()->download($zipFilePath)->deleteFileAfterSend(true);

        } catch (\Exception $e) {
            \Log::error('Bir hata oluştu: ' . $e->getMessage());
            return response()->json(['error' => 'Bir hata oluştu: ' . $e->getMessage()], 500);
        }
    }




}

