<div id="formDetailsModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
     style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Başvuru Bilgileri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="fs-15">
                    <!-- Striped Rows -->
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Data</th>
                        </thead>
                        <tbody>
                        @foreach($data as $datas)
                            <tr>
                                <td class="text-danger">Bölüm Adı</td>
                                <td>{{$datas -> getBolum -> bolumler}}</td>
                            </tr>
                            <tr>
                                <td class="text-danger">İsim Soyisim</td>
                                <td>{{$datas -> name}}</td>
                            </tr>
                            <tr>
                                <td class="text-danger">TC</td>
                                <td>{{$datas -> country_number}}</td>
                            </tr>
                            <tr>
                                <td class="text-danger">Ülke</td>
                                <td>{{$datas -> country}}</td>
                            </tr>
                            <tr>
                                <td class="text-danger">Doğum Yeri</td>
                                <td>{{$datas -> place_of_birth}}</td>
                            </tr>
                            <tr>
                                <td class="text-danger">Doğum Tarihi</td>
                                <td>{{$datas -> date_of_birth}}</td>
                            </tr>
                            <tr>
                                <td class="text-danger">Cinsiyet</td>
                                <td>{{ ($datas -> gender == 'male') ? 'Erkek' : 'Kadın' }}</td>
                            </tr>
                            <tr>
                                <td class="text-danger">Askerlik Belgesi</td>
                                <td>
                                    @if($datas -> military_service = 1)
                                        Yapıldı
                                    @elseif($datas -> military_service = 2)
                                        Yapılmadı
                                    @elseif($datas -> military_service = 3)
                                        Muaf
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger">Askerlik Durumu</td>
                                @if($datas->military_service_certificate == '')
                                    <td class="text-danger"> Dosya Yüklenmemiş</td>
                                @else
                                    <td><a href="{{ asset('form/'.$datas->military_service_certificate) }}" download target="_blank">İndir</a></td>
                                @endif
                            </tr>
                            <tr>
                                <td class="text-danger">Kimlik Belgesi</td>
                                @if($datas->identity == '')
                                    <td class="text-danger"> Dosya Yüklenmemiş</td>
                                @else
                                    <td><a href="{{ asset('form/'.$datas->identity) }}" download target="_blank">İndir</a></td>
                                @endif
                            </tr>
                            <tr>
                                <td class="text-danger">Şehir</td>
                                <td>{{ $datas -> city  }}</td>
                            </tr>
                            <tr>
                                <td class="text-danger">Town</td>
                                <td>{{ $datas -> town  }}</td>
                            </tr>
                            <tr>
                                <td class="text-danger">Telefon</td>
                                <td>{{ $datas -> phone_nummber  }}</td>
                            </tr>
                            <tr>
                                <td class="text-danger"> E-Posta</td>
                                <td>{{ $datas -> email  }}</td>
                            </tr>
                            <tr>
                                <td class="text-danger"> Adres</td>
                                <td>{{ $datas -> address  }}</td>
                            </tr>
                            <tr>
                                <td class="text-danger">  Üniversite </td>
                                <td>{{ $datas -> university  }}</td>
                            </tr>
                            <tr>
                                <td class="text-danger"> Fakülte</td>
                                <td>{{ $datas -> faculty  }}</td>
                            </tr>
                            <tr>
                                <td class="text-danger"> Bölüm</td>
                                <td>{{ $datas -> section  }}</td>
                            </tr>
                            <tr>
                                <td class="text-danger"> Mezuniyet Ortalaması</td>
                                <td>{{ $datas -> graduation_score  }}</td>
                            </tr>
                            <tr>
                                <td class="text-danger"> Başlangıç Tarihi</td>
                                <td>{{ \Carbon\Carbon::parse($datas -> starting_date)->format('d/m/Y')  }}</td>
                            </tr>
                            <tr>
                                <td class="text-danger"> Bitiş Tarihi</td>
                                <td>{{ \Carbon\Carbon::parse($datas -> end_date)->format('d/m/Y')  }}</td>
                            </tr>
                            <tr>
                                <td class="text-danger">Diploma</td>
                                @if($datas->certificate == '')
                                    <td class="text-danger"> Dosya Yüklenmemiş</td>
                                @else
                                    <td><a href="{{ asset('form/'.$datas->certificate) }}" download target="_blank">İndir</a></td>
                                @endif
                            </tr>
                            <tr>
                                <td class="text-danger">Transcript</td>
                                @if($datas->transcript == '')
                                    <td class="text-danger"> Dosya Yüklenmemiş</td>
                                @else
                                    <td><a href="{{ asset('form/'.$datas->transcript) }}" download target="_blank">İndir</a></td>
                                @endif
                            </tr>
                            <tr>
                                <td class="text-danger"> Ales</td>
                                <td>{{ $datas -> ales  }}</td>
                            </tr>
                            <tr>
                                <td class="text-danger">Diploma</td>
                                @if($datas->ales_certificate == '')
                                    <td class="text-danger"> Dosya Yüklenmemiş</td>
                                @else
                                    <td><a href="{{ asset('form/'.$datas->ales_certificate) }}" download target="_blank">İndir</a></td>
                                @endif
                            </tr>
                            <tr>
                                <td class="text-danger"> Yds</td>
                                <td>{{ $datas -> yds  }}</td>
                            </tr>
                            <tr>
                                <td class="text-danger">Diploma</td>
                                @if($datas->yds_certificate == '')
                                    <td class="text-danger"> Dosya Yüklenmemiş</td>
                                @else
                                    <td><a href="{{ asset('form/'.$datas->yds_certificate) }}" download target="_blank">İndir</a></td>
                                @endif
                            </tr>


                        @endforeach
                        </tbody>
                    </table>
                </h5>


            </div>
            <div class="modal-footer">
                @if(isset($datas))
                    <a href="{{ route('form.download-zip', ['id' => $datas->id]) }}" class="btn btn-success">Tüm Dosyaları İndir</a>
                @endif
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
