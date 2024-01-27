@extends('layouts.app')
@section('title', 'Cari Gedung')
@section('content')
    <!-- start our rooms section -->
    <section>
        <div class="container">
            <div class="text-center margin-50px-bottom xs-margin-30px-bottom">
                <h3 class="margin-10px-bottom">Hasil Pencarian</h3>
                <p class="no-margin-bottom">Silahkan Pilih Gedung</p>
            </div>
            <div class="row">
                @foreach ($tersedia as $room)
                    <div class="col-12 margin-30px-bottom">
                        <div class="border {{ !$room->tersedia ? 'bg-gray' : '' }}">
                            <div class="container">
                                <div class="row">
                                    <img style="width: 200px" src={{ asset('/img/produk/' . $room->foto) }}
                                        alt="{{ $room->nama }}" />
                                    @if (!$room->tersedia)
                                        <div class="ribbon ribbon-top-left"><span>Tidak Tersedia</span></div>
                                    @endif
                                    <div class="padding-25px-all">
                                        <h5 class="margin-5px-bottom font-size28 xs-font-size24">{{ $room->nama }}
                                        </h5>
                                        <div
                                            class="font-size12 text-uppercase text-extra-dark-gray font-weight-700 margin-20px-bottom letter-spacing-2">
                                            Harga @currency($room->harga)/Hari</div>
                                        @if ($room->tersedia)
                                            <a href="{{ url('reservasi?date=') . $date . '&gedung=' . $room->id }}"
                                                class="font-weight-600 text-theme-color">Pesan<i
                                                    class="fas fa-arrow-right margin-10px-left vertical-align middle font-size12"></i></a>
                                        @else
                                            <div class="font-weight-600 text-muted cursor-block">
                                                Pesan<i
                                                    class="fas fa-arrow-right margin-10px-left vertical-align middle font-size12"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- end our rooms section -->
@endsection
