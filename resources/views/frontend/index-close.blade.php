@extends('backend.components.master-withoutnavbar')
@section('title') Yüksek Lisans Başvuru Sayfası  @endsection
@section('content')


<div class="container mt-3">
    <div class="row">
        <img src="{{asset('frontend/varlik.svg')}}" width="auto" height="150px" alt="">
    </div>

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">ENSTİTÜ BAŞVURU FORMU</h4>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        {{$data->duyuru_tr}}
                    </div>
                    <div class="col-lg-12">
                        <a href="https://antalya.edu.tr/tr/fakulte-ve-enstituler/lisansustu-egitim-enstitusu">İletişim Bilgileri</a>
                    </div>
                 </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
</div>



@endsection

