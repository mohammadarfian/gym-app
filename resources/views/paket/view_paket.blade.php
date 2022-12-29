@extends('layouts.main')

@section('content')
<div id="main">
    @include('layouts.navbar')
    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Daftar Paket</h3>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <a href="/paket/add" class="btn btn-primary mb-3">Tambah Paket</a>
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Durasi</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allDataPaket as $key => $paket)
                                <tr>
                                    <td>{{$paket->nama}}</td>
                                    <td>{{$paket->durasi}} Hari</td>
                                    <td>Rp. {{$paket->harga}}</td>
                                    <td>
                                        <a href="{{route('pakets.edit', $paket->id)}}" class="btn btn-warning"><span
                                                data-feather="edit"></span></a>
                                        <a href="{{route('pakets.delete', $paket->id)}}" class="btn btn-danger"><span
                                                data-feather="x-circle"></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
