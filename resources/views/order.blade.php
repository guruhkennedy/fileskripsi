@extends('layouts.app')
@section('title', 'Order')
@section('content')
    @php
        if ($result->status == 0) {
            $text = 'Menunggu pembayaran';
            $color = 'text-primary';
            $icon = 'far fa-clock';
        } elseif ($order->status == 1) {
            $text = 'Pembayaran berhasil';
            $color = 'text-success';
            $icon = 'far fa-check-circle';
        } elseif ($order->status == 2) {
            $text = 'Sedang diproses';
            $color = 'text-warning';
            $icon = 'far fa-clock';
        } elseif ($order->status == 3) {
            $text = 'Pembayaran dibatalkan';
            $color = 'text-danger';
            $icon = 'far fa-times-circle';
        }
    @endphp

    <!-- start page title section -->
    <section class="page-title-section bg-img cover-background" data-overlay-dark="4"
        data-background="img/banner/lapangan2.jpg">
        <div class="container">
            <h1>Rincian Pemesanan</h1>
        </div>
    </section>
    <!-- end page title section -->

    <!-- start booking-form section -->
    <section>
        <div class="container">
            @if (session('status'))
                <div class="card-body p-3 p-sm-4 mb-4">
                    <div class="text-danger text-center">
                        <label>
                            {{ session('status') }}
                        </label>
                    </div>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-12 col-md-5">
                    <div class="card p-4 border-0" style="box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.52);">
                        <div class="card-header text-center bg-white border-0">
                            <h6 class="m-0 {{ $color }}">{{ $text }}</h6>
                            <i class="{{ $icon }} {{ $color }} mt-3 mb-3 fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    Kode Pesanan
                                </div>
                                <div class="col-12 col-md-6 text-right font-weight-bold">
                                    {{ $order->kode }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    Items
                                </div>
                                <div class="col-12 col-md-6 text-right">
                                    {{ $product->nama }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    Tanggal
                                </div>
                                <div class="col-12 col-md-6 text-right">
                                    @dateonly($order->created_at)
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    Nama Pemesan
                                </div>
                                <div class="col-12 col-md-6 text-right">
                                    {{ $order->nama }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    Email
                                </div>
                                <div class="col-12 col-md-6 text-right">
                                    {{ $order->email }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    No HP
                                </div>
                                <div class="col-12 col-md-6 text-right">
                                    {{ $order->no_hp }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    Status
                                </div>
                                <div class="col-12 col-md-6 text-right">
                                    {{ $text }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    Harga
                                </div>
                                <div class="col-12 col-md-6 text-right">
                                    @currency($product->harga)
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 font-weight-bold">
                                    Total
                                </div>
                                <div class="col-12 col-md-6 font-weight-bold text-right">
                                    @currency($order->total)
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm text-muted">Invoice</div>
                                <div class="col-sm text-right font-weight-600">
                                    <a href="{{ url('cetak_invoice?kode=' . $order->kode) }}" target="_blank">Lihat
                                        Invoice</a>
                                </div>
                            </div>
                            <hr />
                        </div>
                        @if ($result->status == 0)
                            <div class="card-body p-3 p-sm-4 mb-4" id="box-payment">
                                <div class="row">
                                    <div class="col-sm font-weight-600">Pilih Pembayaran</div>
                                </div>
                                <hr>
                                {{-- <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="payment" id="payment_tunai"
                                        value="cash">
                                    <label class="form-check-label text-muted" for="payment_tunai">
                                        Tunai
                                    </label>
                                </div> --}}
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="payment" id="trf_bank"
                                        value="trf_bank">
                                    <label class="form-check-label text-muted" for="trf_bank">
                                        Transfer Bank
                                    </label>
                                </div>
                                <div class="ms-4" id="display-rekening" style="display: none">
                                </div>
                            </div>
                        @endif

                        @if ($result->status != 0 && $result->status != 3)
                            <div class="card-body p-3 p-sm-4 mb-4">
                                <div class="row">
                                    <div class="col-sm text-muted">Metode Pembayaran</div>
                                    <div class="col-sm text-right fw-bolder">
                                        {{ $result->payment_type == 'cash' ? 'Tunai' : 'Transfer Bank' }}</div>
                                </div>
                                @if ($result->payment_type == 'bank')
                                    <hr>
                                    <div class="row align-items-center">
                                        <div class="col-sm text-muted">Nama Bank</div>
                                        <img src="{{ url('img/bank/' . $rekening->logo) }}"
                                            alt="{{ url('img/bank/' . $rekening->logo) }}"
                                            style="height: 5rem;width:5rem;object-fit:contain;padding:0">
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm text-muted">No. Rekening</div>
                                        <div class="col-sm text-right font-weight-600">{{ $rekening->no_rekening }}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm text-muted">Nama</div>
                                        <div class="col-sm text-right font-weight-600">{{ $rekening->atas_nama }}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm text-muted">Cabang</div>
                                        <div class="col-sm text-right font-weight-600">{{ $rekening->cabang }}</div>
                                    </div>
                                    <hr>
                                    @if ($proof != 0)
                                        <div class="row">
                                            <div class="col-sm text-muted">Tanggal Transfer</div>
                                            <div class="col-sm text-right font-weight-600">{{ $bukti->create_parse() }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm text-muted">Bukti Transfer</div>
                                            <div class="col-sm text-right font-weight-600">
                                                <div class="col-sm text-right font-weight-600"><a
                                                        href="{{ url($bukti->gambar) }}" target="_blank">Lihat Bukti</a>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-sm text-sm-start font-weight-600" style="font-style: italic">
                                                Silahkan
                                                melakukan
                                                pembayaran pada rekening
                                                diatas dan sesuai nominal yang diberikan. Lalu silahkan konfirmasi
                                                pembayaran</div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        @endif

                        <form method="POST" action="{{ url('booking/proof') }}" style="margin-block-end: 0em;flex:1"
                            class="me-3" enctype="multipart/form-data">
                            @csrf
                            @if ($result->status == 2 && $proof == 0 && $result->payment_type != 'cash')
                                <div class="card-body p-3 p-sm-4 mb-4" id="box-payment">
                                    <div class="row">
                                        <div class="col-sm font-weight-600">Upload Bukti Pembayaran</div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <input type="hidden" name="id_reservasi" value="{{ $result->id }}">
                                        <input class="form-control-file" type="file" name="image" id="image">
                                    </div>
                                </div>
                            @endif

                            {{-- jika udah bayar tinggal upload bukti --}}
                            @if ($result->status == 2 && $proof == 0 && $result->payment_type != 'cash')
                                <div class="mt-4 mb-0 d-flex justify-content-between">
                                    <button class="butn btn-block" type="submit">Upload Bukti Pembayaran</button>
                                </div>
                            @endif

                        </form>

                        {{-- jika blm bayar --}}
                        @if ($result->status == 0)
                            <div class="mt-4 mb-0 d-flex justify-content-between">
                                <input type="hidden" name="obj" id="obj" value="{{ $result }}">
                                <form method="POST" action="{{ url('booking/payment') }}"
                                    style="margin-block-end: 0em;flex:1" class="me-3">
                                    @csrf
                                    <input type="hidden" name="id_reservasi" id="id_reservasi"
                                        value="{{ $result->id }}">
                                    <input type="hidden" name="payment_type" id="payment_type">
                                    <input type="hidden" name="id_rekening" id="id_rekening">
                                    <button class="butn" type="submit" id="pay-button" disabled>Bayar</button>
                                </form>
                                <form method="POST" action="{{ url('booking/cancel') }}"
                                    style="margin-block-end: 0em;">
                                    @csrf
                                    <input type="hidden" name="kode" value="{{ $order->kode }}" />
                                    <button type="submit" class="btn btn-payment-cancel">Batal</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- end booking-form section -->
@endsection

@push('customScript')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        function formatRupiah(angka) {
            if (angka == null) {
                return "Rp.-";
            }
            angka = parseInt(angka);
            angka = angka.toString();
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                let separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return "Rp. " + rupiah;
        }

        $(function() {
            // hideApiBank();

            $('input[name="payment"]').on("change", function() {
                $('input[name="payment"]').not(this).prop("checked", false);
            });

            var check_tunai;
            $("#payment_tunai").on("change", function() {
                check_tunai = $("#payment_tunai").prop("checked");
                if (check_tunai) {
                    // alert("Checkbox is checked.");
                    $("#pay-button").prop("disabled", false);
                    $("#trf_bank").prop("indeterminate", false);
                    hideApiBank();
                    $("#payment_type").val("cash");
                } else {
                    // alert("Checkbox is unchecked.");
                    $("#pay-button").prop("disabled", true);
                    $("#trf_bank").prop("indeterminate", false);
                    hideApiBank();
                    $("#payment_type").val("");
                }
            });

            var trf_bank;
            $("#trf_bank").on("change", function() {
                trf_bank = $("#trf_bank").prop("checked");
                if (trf_bank) {
                    // alert("Checkbox is checked.");
                    $("#pay-button").prop("disabled", true);
                    $("#trf_bank").prop("indeterminate", true);
                    callApiBank();
                    $("#payment_type").val("bank");
                    $("#id_rekening").val("");
                } else {
                    // alert("Checkbox is unchecked.");
                    $("#trf_bank").prop("indeterminate", false);
                    $("#pay-button").prop("disabled", true);
                    hideApiBank();
                    $("#payment_type").val("");
                    $("#id_rekening").val("");
                }
            });

            function hideApiBank() {
                $("#display-rekening").hide();
            }

            function callApiBank() {
                $("#display-rekening").show();
                $("#display-rekening").empty();
                $.ajax({
                    type: "GET",
                    url: "/api/rekening",
                    success: function(data) {
                        // the next thing you want to do
                        console.log(data);
                        var $display = $("#display-rekening");
                        for (var i = 0; i < data.length; i++) {
                            $display.append(
                                "<div class='form-check'>" +
                                "<input class='form-check-input' type='checkbox' name='rekening' id='rekening" +
                                data[i].id +
                                "' value='" +
                                data[i].id +
                                "'>" +
                                "<div class='d-flex flex-column' for='rekening" +
                                data[i].id +
                                "'>" +
                                "<label class='form-check-label text-muted' for='rekening" +
                                data[i].id +
                                "'>" +
                                data[i].nama +
                                " - " +
                                "<label class='form-check-label text-muted font-weight-600' for='rekening" +
                                data[i].id +
                                "'>" +
                                data[i].no_rekening +
                                "</label>" +
                                "</label><label class='form-check-label text-muted' for='rekening" +
                                data[i].id +
                                "'>" +
                                "a/n " +
                                data[i].atas_nama +
                                "</label>" +
                                "</div>" +
                                "</div>"
                            );
                        }
                    },
                });
            }

            $(document).on("click", 'input[name="rekening"]', function() {
                $('input[name="rekening"]').not(this).prop("checked", false);
                var atLeastOneIsChecked =
                    $('input[name="rekening"]:checked').length > 0;
                if (atLeastOneIsChecked) {
                    $("#pay-button").prop("disabled", false);
                    $("#trf_bank").prop("indeterminate", false);
                    $("#payment_type").val("bank");
                    $("#id_rekening").val(this.value);
                } else {
                    $("#pay-button").prop("disabled", true);
                    $("#trf_bank").prop("indeterminate", true);
                    $("#id_rekening").val("");
                }
            });

            $(document).on("click", "#btn-edit-profile", function(event) {
                event.preventDefault();
                $("#exampleModal").modal("show");
            });

            $(document).on("click", "#btn-profile-close", function(event) {
                event.preventDefault();
                $("#exampleModal").modal("hide");
            });

            $.ajax({
                type: "GET",
                url: "http://dev.farizdotid.com/api/daerahindonesia/provinsi",
                success: function(data) {
                    // the next thing you want to do
                    console.log(data.provinsi);
                    var $provinces = $("#provinces");
                    for (var i = 0; i < data.provinsi.length; i++) {
                        $provinces.append(
                            "<option id=" +
                            data.provinsi[i].id +
                            " value=" +
                            data.provinsi[i].id +
                            ">" +
                            data.provinsi[i].nama +
                            "</option>"
                        );
                    }
                },
            });

            $(document).on("change", "#provinces", function() {
                // alert("ea");
                var id = $(this).find(":selected")[0].value;
                $.ajax({
                    type: "GET",
                    url: "http://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" +
                        id,
                    success: function(data) {
                        // the next thing you want to do
                        console.log(data.kota_kabupaten);
                        var $regencies = $("#regencies");
                        $regencies.empty();
                        for (var i = 0; i < data.kota_kabupaten.length; i++) {
                            $regencies.append(
                                "<option id=" +
                                data.kota_kabupaten[i].id +
                                " value=" +
                                data.kota_kabupaten[i].id +
                                ">" +
                                data.kota_kabupaten[i].nama +
                                "</option>"
                            );
                        }
                    },
                });
            });

            $(document).on("change", "#date_start", function() {
                let date_start = $(this).val();
                let date_end = $("#date_end").val();
                const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                const firstDate = new Date(date_start);
                const secondDate = new Date(date_end);

                let diffDays = Math.round((secondDate - firstDate) / oneDay);

                let actual = diffDays < 0 ? 0 : diffDays;

                var price = $("#price").val();
                var finalPrice = formatRupiah(Number(actual) * Number(price));
                $("#duration").val(actual);
                $("#total_price").val(finalPrice);
                $("#total-div").html(finalPrice);
            });

            $(document).on("change", "#date_end", function() {
                let date_start = $("#date_start").val();
                let date_end = $(this).val();
                const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                const firstDate = new Date(date_start);
                const secondDate = new Date(date_end);

                let diffDays = Math.round((secondDate - firstDate) / oneDay);
                // diffDays = 0;

                let actual = diffDays < 0 ? 0 : diffDays;

                var price = $("#price").val();
                var finalPrice = formatRupiah(Number(actual) * Number(price));
                $("#duration").val(actual);
                $("#total_price").val(finalPrice);
                $("#total").val(Number(actual) * Number(price));
                $("#total-div").html(finalPrice);
            });

            $(document).on("click", "#btn_fill", function() {
                let user = $("#user_full").val();
                user = JSON.parse(user);
                $("#form_name").val(user.name);
                $("#form_email").val(user.email);
                $("#form_phone").val(user.phone);
            });

            $(".my-rating-r0").starRating({
                useFullStars: true,
                starShape: "rounded",
                starSize: 25,
                emptyColor: "lightgray",
                hoverColor: "#ff7f47",
                activeColor: "#ff7f47",
                useGradient: false,
                minRating: 1,
                callback: function(currentRating, $el) {
                    $("#r0").val(currentRating);
                },
            });
            $(".my-rating-r1").starRating({
                useFullStars: true,
                starShape: "rounded",
                starSize: 25,
                emptyColor: "lightgray",
                hoverColor: "#ff7f47",
                activeColor: "#ff7f47",
                useGradient: false,
                minRating: 1,
                callback: function(currentRating, $el) {
                    $("#r1").val(currentRating);
                },
            });
            $(".my-rating-r2").starRating({
                useFullStars: true,
                starShape: "rounded",
                starSize: 25,
                emptyColor: "lightgray",
                hoverColor: "#ff7f47",
                activeColor: "#ff7f47",
                useGradient: false,
                minRating: 1,
                callback: function(currentRating, $el) {
                    $("#r2").val(currentRating);
                },
            });
            $(".my-rating-r3").starRating({
                useFullStars: true,
                starShape: "rounded",
                starSize: 25,
                emptyColor: "lightgray",
                hoverColor: "#ff7f47",
                activeColor: "#ff7f47",
                useGradient: false,
                minRating: 1,
                callback: function(currentRating, $el) {
                    $("#r3").val(currentRating);
                },
            });
            $(".my-rating-r4").starRating({
                useFullStars: true,
                starShape: "rounded",
                starSize: 25,
                emptyColor: "lightgray",
                hoverColor: "#ff7f47",
                activeColor: "#ff7f47",
                useGradient: false,
                minRating: 1,
                callback: function(currentRating, $el) {
                    $("#r4").val(currentRating);
                },
            });
        });
    </script>
    <script>
        function addMinutes(date, minutes) {
            return new Date(date + minutes * 60000).getTime();
        }
        // Mengatur waktu akhir perhitungan mundur
        var date = "{{ isset($midtrans) ? $midtrans->transaction_time : 0 }}";
        var dates = new Date(date).getTime();
        var countDownDate = addMinutes(dates, 15);
        document.getElementById("time_expired").innerHTML = "Checking...";
        // Memperbarui hitungan mundur setiap 1 detik
        var x = setInterval(function() {
            // Untuk mendapatkan tanggal dan waktu hari ini
            var now = new Date().getTime();
            // console.log(countDownDate)
            // console.log(now)
            // Temukan jarak antara sekarang dan tanggal hitung mundur
            var distance = countDownDate - now
            console.log(distance)
            // Perhitungan waktu untuk hari, jam, menit dan detik
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Keluarkan hasil dalam elemen dengan id = "time_expired"
            document.getElementById("time_expired").innerHTML =
                minutes + "m " + seconds + "s ";
            // Jika hitungan mundur selesai, tulis beberapa teks
            if (distance < 25200000) {
                clearInterval(x);
                document.getElementById("time_expired").innerHTML = "EXPIRED";
                document.getElementById("checktime").style.display = "none";
            }
        }, 1000);
    </script>
@endpush
