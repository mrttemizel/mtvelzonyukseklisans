@extends('backend.components.master-withoutnavbar')
@section('title')
    @lang('home.header')
@endsection
@section('content')

    <div class="container mt-3">
        <div class="row">
            <img src="{{asset('frontend/varlik.svg')}}" width="auto" height="150px" alt="">
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">@lang('home.header')</h4>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Language
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('student.index', ['locale' => 'tr']) }}">TR</a>
                                <a class="dropdown-item" href="{{ route('student.index', ['locale' => 'en']) }}">EN</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('form.store',['locale' => app()->getLocale()])}}" class="application_form"
                              id="application_form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-1">
                                <div class="col-lg-12">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.bolumler')</label>
                                            <span class="text-danger ">
                                    @error('bolum_id')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <select class="form-select mb-3" aria-label="Default select example"
                                                    name="bolum_id">
                                                <option selected disabled>@lang('home.bolumler')</option>

                                                @foreach( $bolumler as $item)
                                                    <option
                                                        value="{{$item -> id}}" @selected(old('bolum_id') == $item -> id)>{{$item ->bolumler}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <h6 style="color: #01AAC8"><b>@lang('home.iletisim_bilgiler')</b></h6>
                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.isim_soyisim')</label>
                                            <span class="text-danger">
                                    @error('name')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="text" class="form-control" id="labelInput" name="name"
                                                   value="{{ old('name') }}">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.tc')</label>
                                            <span class="text-danger">
                                    @error('country_number')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="text" class="form-control" id="labelInput"
                                                   name="country_number" value="{{ old('country_number') }}">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.ulke')</label>
                                            <span class="text-danger">
                                    @error('country')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="text" class="form-control" id="labelInput" name="country"
                                                   value="{{ old('country') }}">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.dogum_yeri')</label>
                                            <span class="text-danger">
                                    @error('place_of_birth')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="text" class="form-control" id="labelInput"
                                                   name="place_of_birth" value="{{ old('place_of_birth') }}">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.dogum_tarihi')</label>
                                            <span class="text-danger">
                                    @error('date_of_birth')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="date" class="form-control" id="labelInput" name="date_of_birth"
                                                   value="{{ old('date_of_birth') }}">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <label for="labelInput" class="form-label"><span
                                                class="text-danger">*</span> @lang('home.cinsiyet')</label>
                                        <span class="text-danger">
                                    @error('gender')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input"  type="radio" name="gender"
                                                   value="male"  {{ old('gender')=="male" ? 'checked='.'"'.'checked'.'"' : '' }} id="male">
                                            <label class="form-check-label" for="male">
                                                @lang('home.erkek')
                                            </label>
                                            <br>
                                            <input class="form-check-input"  type="radio" name="gender"
                                                   value="woman" {{ old('gender')=="woman" ? 'checked='.'"'.'checked'.'"' : '' }} id="woman">
                                            <label class="form-check-label" for="woman">
                                                @lang('home.kiz')
                                            </label>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2" id="military_service_area">
                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.askerlik_durumu')</label>
                                            <span class="text-danger" id="is_military_services">
                                    @error('military_service')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <select class="form-select mb-3" aria-label="Default select example"
                                                    name="military_service">
                                                <option selected disabled>@lang('home.seciniz')</option>
                                                <option value="1">@lang('home.yapildi')</option>
                                                <option value="2">@lang('home.yapilmadi')</option>
                                                <option value="3">@lang('home.muaf')</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.askerlik_belgesi')</label>
                                            <span class="text-danger" id="is_military_services">
                                    @error('military_service_certificate')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="file" class="form-control" id="labelInput"
                                                   name="military_service_certificate">
                                            <span class="text-info">@lang('home.aciklama')</span><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.kimlik_belgesi')</label>
                                            <span class="text-danger">
                                    @error('identity')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="file" class="form-control" id="labelInput" name="identity"
                                                   value="{{ old('identity') }}">
                                            <span class="text-info">@lang('home.aciklama')</span><br>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <h6 style="color: #01AAC8"><b>@lang('home.iletisim_bilgiler')</b></h6>
                                <div class="col-lg-6">

                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.sehir')</label>
                                            <span class="text-danger">
                                    @error('city')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="text" class="form-control" id="labelInput" name="city"
                                                   value="{{old('city')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <label for="labelInput" class="form-label"><span
                                                class="text-danger">*</span> @lang('home.ilce')</label>
                                        <span class="text-danger">
                                    @error('town')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="text" class="form-control" id="labelInput" name="town"
                                               value="{{old('town')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.phone')</label>
                                            <span class="text-danger">
                                    @error('phone_nummber')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="text" class="form-control" id="labelInput" name="phone_nummber"
                                                   value="{{old('phone_nummber')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <label for="labelInput" class="form-label"><span
                                                class="text-danger">*</span> @lang('home.email')</label>
                                        <span class="text-danger">
                                    @error('email')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="text" class="form-control" id="labelInput" name="email"
                                               value="{{old('email')}}">

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.adres')</label>
                                            <span class="text-danger">
                                    @error('address')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="text" class="form-control" id="labelInput" name="address"
                                                   value="{{old('address')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <h6 style="color: #01AAC8"><b>@lang('home.lisans_mezuniyet')</b></h6>

                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.universite')</label>
                                            <span class="text-danger">
                                    @error('university')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="text" class="form-control" id="labelInput" name="university"
                                                   value="{{old('university')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.fakulte')</label>
                                            <span class="text-danger">
                                    @error('faculty')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="text" class="form-control" id="labelInput" name="faculty"
                                                   value="{{old('faculty')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.bolum')</label>
                                            <span class="text-danger">
                                    @error('section')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="text" class="form-control" id="labelInput" name="section"
                                                   value="{{old('section')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.mezuniyet_ortalamasi')
                                            </label>
                                            <span class="text-danger">
                                    @error('graduation_score')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="text" class="form-control" id="mezuniyet_ortalamasi"
                                                   placeholder="0-100" name="graduation_score"
                                                   value="{{old('graduation_score')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.baslangic_tarihi')</label>
                                            <span class="text-danger">
                                    @error('starting_date')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="date" class="form-control" id="labelInput" name="starting_date"
                                                   value="{{old('starting_date')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.bitis_tarihi')</label>
                                            <span class="text-danger">
                                    @error('end_date')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="date" class="form-control" id="labelInput" name="end_date"
                                                   value="{{old('end_date')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.diploma')</label>
                                            <span class="text-danger">
                                    @error('certificate')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="file" class="form-control" id="labelInput" name="certificate">
                                            <span class="text-info">@lang('home.aciklama')</span><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label"><span
                                                    class="text-danger">*</span> @lang('home.transcript')</label>
                                            <span class="text-danger">
                                    @error('transcript')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="file" class="form-control" id="labelInput" name="transcript">
                                            <span class="text-info">@lang('home.aciklama')</span><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <h6 style="color: #01AAC8"><b>SINAV SONUÇLARI</b></h6>

                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label">@lang('home.ales')</label>
                                            <span class="text-danger">
                                    @error('ales')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="text" name="ales" class="form-control" id="ales_puani"
                                                   placeholder="0-100" value="{{old('ales')}}">
                                            <span class="text-info">@lang('home.puan')</span>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <div id="alesBelgesi">
                                            <label for="labelInput"
                                                   class="form-label">@lang('home.ales_belgesi')</label>
                                            <span class="text-danger">
                                    @error('ales_certificate')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="file" class="form-control" name="ales_certificate"
                                                   id="labelInput">
                                            <span class="text-info">@lang('home.aciklama')</span><br>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label">@lang('home.yds')</label>

                                            <input type="text" name="yds" class="form-control" id="yds_puani"
                                                   placeholder="0-100" value="{{old('yds')}}">
                                            <span class="text-info">@lang('home.puan')</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6" id="ydsBelge">
                                    <div>
                                        <div>
                                            <label for="labelInput" class="form-label">@lang('home.yds_belgesi')</label>
                                            <span class="text-danger">
                                    @error('yds_certificate')
                                                {{ $message }}
                                                @enderror
                            </span>
                                            <input type="file" class="form-control" name="yds_certificate"
                                                   id="labelInput">
                                            <span class="text-info">@lang('home.aciklama')</span><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="KVKK" id="formCheck1">

                                            <label class="form-check-label" for="formCheck1">
                                                <a href="https://antalya.edu.tr/tr/kvkk-aydinlatma-metni"
                                                   target="_blank"><span
                                                        class="text-danger">* </span> @lang('home.kvkk')</a>
                                            </label>
                                        </div>
                                        <span class="text-danger">
                                    @error('KVKK')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary mt-3">@lang('home.submit')</button>
                        </form>


                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
    </div>

@endsection
@section('addjs')

    <script src="https://unpkg.com/imask"></script>

    <script>



            document.addEventListener('DOMContentLoaded', function() {

                var genderInputs = document.querySelectorAll('input[name="gender"]');

                var militaryServiceArea = document.getElementById('military_service_area');


                genderInputs.forEach(function(input) {
                    input.addEventListener('change', function() {

                        if (this.value === 'male') {
                            militaryServiceArea.style.display = 'flex';
                        } else {

                            militaryServiceArea.style.display = 'none';
                        }
                    });
                });
                });



        $(document).ready(function () {


            IMask(
                document.getElementById('mezuniyet_ortalamasi'),
                {
                    mask: /^[0-9]\d{0,2}$/
                },
            )
            IMask(
                document.getElementById('ales_puani'),
                {
                    mask: Number,
                    scale: 2,
                    thousandsSeparator: '',
                    padFractionalZeros: true,
                    normalizeZeros: true,
                    radix: ',',
                    mapToRadix: ['.'],
                    min: 0,
                    max: 100
                },
            )

            var yds = document.getElementById('yds_puani')
            IMask(
                yds,
                {
                    mask: Number,
                    scale: 2,
                    thousandsSeparator: '',
                    padFractionalZeros: true,
                    normalizeZeros: true,
                    radix: ',',
                    mapToRadix: ['.'],
                    min: 0,
                    max: 100
                },
            )


        });

    </script>
@endsection
