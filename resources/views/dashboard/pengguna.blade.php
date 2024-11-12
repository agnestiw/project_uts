@extends('layout.main')
@section('page-title', 'Dashboard')
@section('page-subTitle', 'Dashboard Pengguna')
@section('content')
    <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-0">Wellcome, {{ Auth::user()->name }}</h6>
    </nav>
@endsection
