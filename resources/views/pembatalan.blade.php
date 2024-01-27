@extends('layouts.app')

@section('title', 'Tiket Pembatalan')

@section('content')
    <!-- start page title section -->
    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="">
        <div class="container">
            <h1>Tiket Pembatalan</h1>
            <ul>
                <li>
                    <a href="index.html">Beranda</a>
                </li>
                <li>
                    <a href="#!">Tiket Pembatalan</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- end page title section -->

    <!-- start gallery section -->
    <section>
        <div class="container">
            @if (session('success'))
                <div class="alert alert-warning text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger text-center" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-heading">
                        <h2>Tiket Pembatalan</h2>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="contact-form">
                        <form action="{{ route('user-pembatalan.store') }}" method="POST" id="pembatalan-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kode">Kode Booking</label>
                                        <input id="kode" name="kode" placeholder="GDXXXXXX" type="text"
                                            name="kode" value="{{ old('kode') }}">
                                        @error('kode')
                                            <small id="passwordHelp" class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp">No HP</label>
                                        <input id="no_hp" name="no_hp" placeholder="085156842765" type="text"
                                            name="no_hp" value="{{ old('no_hp') }}">
                                        @error('no_hp')
                                            <small id="passwordHelp" class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alasan">Alasan</label>
                                        <textarea id="alasan" name="alasan" placeholder="Alasan Pembatalan" type="text" name="alasan" rows="5"
                                            value="{{ old('alasan') }}"></textarea>
                                        @error('alasan')
                                            <small id="passwordHelp" class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="butn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <!-- end gallery section -->
@endsection
