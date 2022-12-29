@extends('layouts.main')

@section('content')
<div id="main">
    @include('layouts.navbar')
    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Daftar Coach</h3>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{route('coachs.update', $editData->id)}})}}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{$editData->nama}}" required
                                data-validation-required-message="This field is required">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="{{$editData->alamat}}" required
                                data-validation-required-message="This field is required">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Telp</label>
                            <input type="char" name="no_telp" class="form-control" value="{{$editData->no_telp}}" required
                                data-validation-required-message="This field is required">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
