@extends('backend.components.master')
@section('title')
    Site Ayarları Düzenle
@endsection
@section('css')

@endsection
@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
           Site Ayarları
        @endslot
        @slot('title')
            Site Ayarları Düzenle
        @endslot
    @endcomponent
    <div class="row mt-3">
        <div class="col-lg-12">
            @if (session()->get('success'))
                <div class="alert alert-success alert-dismissible alert-solid alert-label-icon fade show"
                     role="alert">
                    <i class="ri-check-double-line label-icon"></i><strong>  {{ session()->get('success') }}</strong></strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif
            @if (session()->get('error'))
                <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show"
                     role="alert">
                    <i class="ri-check-double-line label-icon"></i><strong>  {{ session()->get('success') }}</strong></strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Başvuru Ekranı Aç - Kapat</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('settings.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Ekran Duyuru Mesajı <span class="text-danger fw-bolder">( TR )</span></label>
                                        <input type="text" class="form-control" name="duyuru_tr" value="{{$data->duyuru_tr}}">
                                        <span class="text-danger">
                                    @error('duyuru_tr')
                                            {{ $message }}
                                            @enderror
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Ekran Duyuru Mesajı <span class="text-danger fw-bolder">( EN )</span></label>
                                        <input type="text" class="form-control" name="duyuru_en" value="{{$data->duyuru_en}}">
                                        <span class="text-danger">
                                    @error('duyuru_en')
                                            {{ $message }}
                                            @enderror
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div>
                                    <div class="form-check form-switch form-switch-lg" dir="ltr">
                                        <input type="checkbox" class="form-check-input" id="customSwitchsizelg" name="status"  {{$data ->status=="on" ? "checked" : ""}}>
                                        <label class="form-check-label" for="customSwitchsizelg">Başvuru Ekranı Kapat</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Güncelle</button>
                    </form>


                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

    <div class="row mt-5" >
        <div class="col-lg-12">
            <div class="card mt-n5">

            </div>

        </div>
    </div>



@endsection



