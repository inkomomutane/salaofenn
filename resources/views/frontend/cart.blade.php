@extends('layouts.frontendLayout')
@section('content')
    <section class="section-pagetop bg-secondary">
        <div class="container clearfix">
            <h2 class="title-page"><i class="fa fa-shopping-cart"></i> Carrinha</b></h2>

            <nav class="float-left">
            <ol class="breadcrumb  bg-white px-3 py-1">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active"  aria-current="page"><a href="" style="color: gray">carrinha</a></li>
            </ol>  
            </nav>
        </div> <!-- container //  -->
    </section>
<!-- =========================================================================-->
	<example-component baseurl ="{{ url('/') }}"></example-component>
<!-- ========================= SECTION CONTENT END// ========================= -->
@push('js')
	<script src="{{ asset('js/app.js') }}"></script>
@endpush
@endsection