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
                    <div class="btn-group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">TR</a>
                            <a class="dropdown-item" href="#">EN</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('student.store')}}" class="application_form" id="application_form" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row gy-1">
                            <div class="col-lg-12">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Bölümler</label>
                                        <span class="text-danger ">
                                    @error('bolum_id')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <select class="form-select mb-3" aria-label="Default select example" name="bolum_id">
                                            <option selected disabled>Bölüm Seçiniz</option>
                                            @foreach( $bolumler as $item)
                                            <option value="{{$item -> id}}" @selected(old('bolum_id') == $item -> id)>{{$item ->bolumler_tr}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <h6 style="color: #01AAC8"><b>KİŞİSEL BİLGİLER</b></h6>
                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span>  İsim Soyisim</label>
                                        <span class="text-danger">
                                    @error('name')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="text" class="form-control" id="labelInput" name="name" value="{{ old('name') }}">

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> TC</label>
                                        <span class="text-danger">
                                    @error('country_number')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="text" class="form-control" id="labelInput" name="country_number" value="{{ old('country_number') }}">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Ülke</label>
                                        <span class="text-danger">
                                    @error('country')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="text" class="form-control" id="labelInput" name="country" value="{{ old('country') }}">

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Doğum Yeri</label>
                                        <span class="text-danger">
                                    @error('place_of_birth')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="text" class="form-control" id="labelInput" name="place_of_birth" value="{{ old('place_of_birth') }}">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Doğum Tarihi</label>
                                        <span class="text-danger">
                                    @error('date_of_birth')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="date" class="form-control" id="labelInput" name="date_of_birth" value="{{ old('date_of_birth') }}">

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="labelInput" class="form-label"><span class="text-danger">*</span> Cinsiyet</label>
                                    <span class="text-danger">
                                    @error('gender')
                                        {{ $message }}
                                        @enderror
                            </span>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="gender"  value="male" {{ old('gender')=="male" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                        <label class="form-check-label">
                                            Erkek
                                        </label>
                                        <br>
                                        <input class="form-check-input" type="radio" name="gender" value="woman" {{ old('gender')=="woman" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                        <label class="form-check-label">
                                            Kız
                                        </label>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <di class="row mt-2" id="askerlikBolumu">
                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Askerlik Durumu</label>
                                        <span class="text-danger" id="is_military_services">
                                    @error('military_service')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <select class="form-select mb-3" aria-label="Default select example" name="military_service">
                                            <option selected disabled>Seçiniz</option>
                                            <option value="1">Yapıldı</option>
                                            <option value="2">Muaf</option>
                                            <option value="3">Yapılmadı</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Askerlik Durum Belgesi</label>
                                        @error('military_service_certificate')
                                        {{ $message }}
                                        @enderror
                                        </span>
                                        <input type="file" class="form-control" id="labelInput" name="military_service_certificate">
                                        <span class="text-info">Lütfen belgelerinizi <b>" docx,pdf,jpg,png,doc "</b> formatında yükleyiniz. Hata almanız durumunda belgeleri tekrar yüklemelisiniz.</span><br>
                                        <span class="text-danger">

                                    </div>
                                </div>
                            </div>
                        </di>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Kimlik Belgesi</label>
                                        <span class="text-danger">
                                    @error('identity')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="file" class="form-control" id="labelInput" name="identity" value="{{ old('identity') }}" >
                                        <span class="text-info">Lütfen belgelerinizi <b>" docx,pdf,jpg,png,doc "</b> formatında yükleyiniz. Hata almanız durumunda belgeleri tekrar yüklemelisiniz.</span><br>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <h6 style="color: #01AAC8"><b>İLETİŞİM BİLGİLER</b></h6>
                            <div class="col-lg-6">

                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Şehir</label>
                                        <span class="text-danger">
                                    @error('city')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="text" class="form-control" id="labelInput" name="city" value="{{old('city')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="labelInput" class="form-label"><span class="text-danger">*</span> İlçe</label>
                                    <span class="text-danger">
                                    @error('town')
                                        {{ $message }}
                                        @enderror
                            </span>
                                    <input type="text" class="form-control" id="labelInput" name="town" value="{{old('town')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Cep Telefonu</label>
                                        <span class="text-danger">
                                    @error('phone_nummber')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="text" class="form-control" id="labelInput" name="phone_nummber" value="{{old('phone_nummber')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="labelInput" class="form-label"><span class="text-danger">*</span> E-Posta</label>
                                    <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                        @enderror
                            </span>
                                    <input type="text" class="form-control" id="labelInput" name="email" value="{{old('email')}}">

                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Adres</label>
                                        <span class="text-danger">
                                    @error('address')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="text" class="form-control" id="labelInput" name="address" value="{{old('address')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <h6 style="color: #01AAC8"><b>LİSANS MEZUNİYET BİLGİSİ</b></h6>

                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Üniversite</label>
                                        <span class="text-danger">
                                    @error('university')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="text" class="form-control" id="labelInput" name="university" value="{{old('university')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Fakülte</label>
                                        <span class="text-danger">
                                    @error('faculty')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="text" class="form-control" id="labelInput" name="faculty" value="{{old('faculty')}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Bölüm</label>
                                        <span class="text-danger">
                                    @error('section')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="text" class="form-control" id="labelInput" name="section" value="{{old('section')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Mezuniyet Ortalaması</label>
                                        <span class="text-danger">
                                    @error('graduation_score')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="text" class="form-control" id="mezuniyet_ortalamasi" placeholder="0-100" name="graduation_score" value="{{old('graduation_score')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Başlangıç Tarihi</label>
                                        <span class="text-danger">
                                    @error('starting_date')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="date" class="form-control" id="labelInput" name="starting_date" value="{{old('starting_date')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Bitiş Tarihi</label>
                                        <span class="text-danger">
                                    @error('end_date')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="date" class="form-control" id="labelInput" name="end_date" value="{{old('end_date')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Diploma</label>
                                        <span class="text-danger">
                                    @error('certificate')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="file" class="form-control" id="labelInput" name="certificate">
                                        <span class="text-info">Lütfen belgelerinizi <b>" docx,pdf,jpg,png,doc "</b> formatında yükleyiniz. Hata almanız durumunda belgeleri tekrar yüklemelisiniz.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label"><span class="text-danger">*</span> Transcript</label>
                                        <span class="text-danger">
                                    @error('transcript')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="file" class="form-control" id="labelInput" name="transcript">
                                        <span class="text-info">Lütfen belgelerinizi <b>" docx,pdf,jpg,png,doc "</b> formatında yükleyiniz. Hata almanız durumunda belgeleri tekrar yüklemelisiniz.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <h6 style="color: #01AAC8"><b>SINAV SONUÇLARI</b></h6>

                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label">ALES</label>
                                        <span class="text-danger">
                                    @error('ales')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="text" name="ales" class="form-control" id="ales_puani" placeholder="0-100" value="{{old('ales')}}">
                                        <span class="text-info">Puan girmeniz durumunda belge yüklemeniz gerekmektedir.</span>


                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <div id="alesBelgesi">
                                        <label for="labelInput" class="form-label">ALES Belgesi</label>
                                        <span class="text-danger">
                                    @error('ales_certificate')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="file" class="form-control"  name="ales_certificate" id="labelInput"  >
                                        <span class="text-info">Lütfen belgelerinizi <b>" docx,pdf,jpg,png,doc "</b> formatında yükleyiniz. Hata almanız durumunda belgeleri tekrar yüklemelisiniz.</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label">YDS</label>

                                        <input type="text" name="yds"  class="form-control" id="yds_puani" placeholder="0-100" value="{{old('yds')}}">
                                        <span class="text-info">Puan girmeniz durumunda belge yüklemeniz gerekmektedir.</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6"  id="ydsBelge">
                                <div>
                                    <div>
                                        <label for="labelInput" class="form-label">Yabancı Dil Belgesi</label>
                                        <span class="text-danger">
                                    @error('yds_certificate')
                                            {{ $message }}
                                            @enderror
                            </span>
                                        <input type="file" class="form-control" name="yds_certificate" id="labelInput">
                                        <span class="text-info">Lütfen belgelerinizi <b>" docx,pdf,jpg,png,doc "</b> formatında yükleyiniz. Hata almanız durumunda belgeleri tekrar yüklemelisiniz.</span>
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
                                            <a href="https://antalya.edu.tr/tr/kvkk-aydinlatma-metni" target="_blank"><span class="text-danger">* </span> Kişisel verilerimin metinde belirtilen şekillerde işlenmesini onaylıyorum ve izin veriyorum.</a>
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

                        <button type="submit" class="btn btn-primary mt-3">Başvuru Yap</button>
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



        $(document).ready(function(){


            $('#application_form').on('submit', function(e) {
                e.preventDefault();
                var form = this;

                console.log(form);



            });

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

            var yds =document.getElementById('yds_puani')
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

            $('input[name="gender"]').on("change", function() {
                if($(this).val() === "male")
                {
                    $('#askerlikBolumu').show();
                }
                else{
                    $('#askerlikBolumu').hide();
                }
            });




        });

    </script>
@endsection
