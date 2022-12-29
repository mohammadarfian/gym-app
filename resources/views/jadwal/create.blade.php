@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
    $(function () {
        $("#pembayaran").change(function () {
            if ($("#cod").is(":selected")) {
                $("#norek").hide();
                $("#bukti_tf").hide();
            } else {
                $("#norek").show();
                $("#bukti_tf").show();
            }
        }).trigger('change');
    });
</script>
<section class="logos-section theme-bg-primary py-5">
    <div class="container" style="border-radius: 20px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center">Buat Jadwal</h3>
                <form method="post" action="{{url('jadwal/store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label">Pilih Coach</label>
                        <select class="form-control" name="coach_id">
                            @foreach($coach as $data)
                            <option value="{{$data->id}}">{{$data->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Pilih Paket</label>
                        <select class="form-select" name="paket_id">
                            @foreach($paket as $data)
                            <option value="{{$data->id}}">{{$data->nama}} ({{$data->durasi}} Hari) - Rp. {{$data->harga}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Pilih Metode Pembayaran</label>
                        <select class="form-select" name="pembayaran" id="pembayaran">
                            <option value="0" id="cod">Bayar Di Tempat</option>
                            <option value="1" id="tf">Transfer</option>
                        </select>
                    </div>
                    <div class="alert alert-info" id="norek">
                        Tujuan Transfer: <br>
                        No. Rekening 5371965290 <br>
                        BCA A/N Ariesta Utami
                    </div>
                    <div class="custom-file mb-3" id="bukti_tf">
                        <label class="form-label">Bukti Transfer</label>
                        <input type="file" name="bukti" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
