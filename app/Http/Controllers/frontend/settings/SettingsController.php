<?php

namespace App\Http\Controllers\frontend\settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){

        $data = Setting::find(1);
        return view('backend.settings.index',compact('data'));
    }

    public function update(Request $request){
        $data = Setting::find(1);


        $request->validate([
            'duyuru_tr' => 'required',
            'duyuru_en' => 'required',
        ]);

        $data->duyuru_tr = $request->input('duyuru_tr');
        $data->duyuru_tr = $request->input('duyuru_en');
        $data->status = $request->status;

        $query = $data->update();

        if (!$query) {
            return back()->with('error', 'Düzenlerken Bir Hata Oluştu!');
        } else {
            return back()->with('success', 'Düzenleme İşlemi Başarılı.');
        }
    }
}
