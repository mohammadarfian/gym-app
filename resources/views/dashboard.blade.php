@extends('layouts.main')

@section('content')
<div id="main">
    @include('layouts.navbar')
    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Dashboard</h3>
            <h6>Welcome, {{ auth()->user()->name }}</h6>
        </div>
    </div>
</div>
@endsection
