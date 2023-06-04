<div>
    
    <p class="font-bold text-[32px]" style="text-align: center; padding-top:10px;">SURAT RUJUKAN</p>

    <div style="padding-left: 100px; padding-top:25px;">
        <p>Kepada yth</p>
        <p>{{ $dokter }}</p>
        <p>{{ $rs }}</p>
    </div>

    <div style="padding-left: 100px; padding-top:25px;">
        <p>dengan hormat,</p>
        <p>Mohon perawatan lebih lanjut untuk pasien dibawah ini :</p>
        <p>Nama            :{{ $namapasien }}</p>
        <p>Umur            :{{ $umur }}</p>
        <p>Jenis Kelamin   :{{ $jeniskelamin }}</p>    
        <p>Alamat          :{{ $alamat }}</p>
    </div>
    
    <div style="padding-left: 100px; padding-top:0%;">
        <p>pada pemeriksaan saya melampirkan :</p>
        <p>1.   Keluhan Pasien       :{{ $keluhan }}</p>
        <p>2.   Diagnosa             :{{ $diagnosa }}</p>
        <p>3.   Alasan dirujuk       :{{ $alasandirujuk }}</p>
    </div>

    <div style="text-align: right;">
        <p style="margin-bottom: 10px;">Bandung,{{ $tanggalHariIni }}</p>
        <p>{{ $dokterrujukan }}</p>
    </div>
    
</div>
