@extends('layouts.main')

@section('content')
<div id="main">
    @include('layouts.navbar')
    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Tambah Coach</h3>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{route('coachs.store')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="string" name="nama" class="form-control" required
                                data-validation-required-message="This field is required">
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No Telp</label>
                            <input type="char" name="no_telp" class="form-control" required
                                data-validation-required-message="This field is required">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="string" name="alamat" class="form-control" required
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
