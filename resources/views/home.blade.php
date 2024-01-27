@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <!-- start banner -->
    <section class="bg-img screen-height cover-background beach-banner" data-overlay-dark="2"
        data-background="img/IMG_0238.jpg">

        <!-- start banner text -->
        <div class="container h-100">
            <div class="header-text text-center display-table h-100 ml-auto mr-auto">
                <div class="display-table-cell vertical-align-bottom">
                    <div class="bg-white-opacity padding-40px-top padding-35px-bottom padding-40px-lr border-radius-3">

                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cek Ketersediaan</label>
                                    <input type="text" name="tgl" placeholder="Pilih Tanggal" id="tgl">
                                </div>
                            </div>
                            <div class="col-md-6 margin-15px-top">
                                <form method="get" action="{{ url('cari') }}">
                                    @csrf
                                    <input type="hidden" name="date" placeholder="date" id="date">

                                    <button type="submit" class="butn no-margin-bottom btn-block">Cari Gedung</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end banner text -->
    </section>
    <!-- end banner -->

    <!-- start about us section -->
    
    <!-- end about us section -->

    <!-- start services section -->
    <section>
        <div class="container lg-container">
            <div class="text-center margin-70px-bottom xs-margin-30px-bottom">
                <h3 class="margin-10px-bottom">Fasilitas Di Sekitar Gedung</h3>
                <p class="no-margin-bottom">Anda Bisa melihat Pada Menu Galleri Untuk Foto Lengkapnya</p>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-3 md-margin-30px-bottom">
                    <div class="bg-white border padding-40px-all h-100">
                        <span class="margin-20px-bottom font-size40 text-theme-color display-inline-block"><i
                                class="ti-car"></i></span>
                        <h3 class="font-size20 margin-20px-bottom sm-margin-10px-bottom">Tempat Parkir</h3>
                        <p class="no-margin-bottom">Kami Menyediakan Tempat Parkir Untuk Kendaraan Motor/Mobil Dengan Kapasitas Maksimal 500 Kendaraan.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 md-margin-30px-bottom">
                    <div class="bg-white border padding-40px-all h-100">
                        <span class="margin-20px-bottom font-size40 text-theme-color display-inline-block"><i
                                class="ti-bookmark"></i></span>
                        <h3 class="font-size20 margin-20px-bottom sm-margin-10px-bottom">Masjid</h3>
                        <p class="no-margin-bottom">Masjid AT-TAQWA Adalah Masjid Yang Ada di Sekitaran Gedung Balitro. Dapat Digunakan Siapa Saja.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 xs-margin-30px-bottom">
                    <div class="bg-white border padding-40px-all h-100">
                        <span class="margin-20px-bottom font-size40 text-theme-color display-inline-block"><i
                                class="ti-comments-smiley"></i></span>
                        <h3 class="font-size20 margin-20px-bottom sm-margin-10px-bottom">Kantin</h3>
                        <p class="no-margin-bottom">Terdapat Kantin Dengan Berbagai Menu Makanan Dan Minuman Dengan Harga Yang Terjangkau. Buka Dari Jam 07:00 Pagi s/d 16:00 Sore.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="bg-white border padding-40px-all h-100">
                        <span class="margin-20px-bottom font-size40 text-theme-color display-inline-block"><i
                                class="ti-wallet"></i></span>
                        <h3 class="font-size20 margin-20px-bottom sm-margin-10px-bottom">ATM 24 Jam</h3>
                        <p class="no-margin-bottom">Tersedia Mesin ATM Bersama 24 Jam. Bagi Siapapun Yang Ingin Mengambil Uang Tunai.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end services section -->

    <!-- start popular things section -->
    <!-- end popular things section -->

    <!-- start testimonial section -->
    <section>
        <div class="container">
            <div class="text-center margin-50px-bottom xs-margin-30px-bottom">
                <h3 class="margin-10px-bottom">Testimoni</h3>
                <p class="no-margin-bottom">Berikut Adalah Testimoni Dari Beberapa Pelanggan</p>
            </div>
            <div class="owl-carousel owl-theme text-center" id="testmonials-carousel">
                <div>
                    <img class="rounded-circle margin-30px-bottom" src="img/testmonials/t-1.jpg" alt="" />
                    <p
                        class="line-height-35 xs-line-height-30 font-size18 xs-font-size16 text-extra-dark-gray margin-30px-bottom xs-margin-25px-bottom width-60 md-width-65 sm-width-85 xs-width-100 center-col font-italic">
                        "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been the industry's standard dummy text ever since the 1500s, when an unknown printer."</p>
                    <h6 class="font-size18 no-margin-bottom">Isabel Rowla</h6>
                    <small>Customer</small>
                </div>

                <div>
                    <img class="rounded-circle margin-30px-bottom" src="img/testmonials/t-2.jpg" alt="" />
                    <p
                        class="line-height-35 xs-line-height-30 font-size18 xs-font-size16 text-extra-dark-gray margin-30px-bottom xs-margin-25px-bottom width-60 md-width-65 sm-width-85 xs-width-100 center-col font-italic">
                        "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been the industry's standard dummy text ever since the 1500s, when an unknown printer."</p>
                    <h6 class="font-size18 no-margin-bottom">James Martin</h6>
                    <small>Customer</small>
                </div>

                <div>
                    <img class="rounded-circle margin-30px-bottom" src="img/testmonials/t-3.jpg" alt="" />
                    <p
                        class="line-height-35 xs-line-height-30 font-size18 xs-font-size16 text-extra-dark-gray margin-30px-bottom xs-margin-25px-bottom width-60 md-width-65 sm-width-85 xs-width-100 center-col font-italic">
                        "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been the industry's standard dummy text ever since the 1500s, when an unknown printer."</p>
                    <h6 class="font-size18 no-margin-bottom">Joe Shepard</h6>
                    <small>Customer</small>
                </div>
            </div>
        </div>
    </section>
    <!-- end testimonial section -->

    <!-- start blog section -->
    <!--<section>-->
    <!--    <div class="container lg-container">-->
    <!--        <div class="text-center margin-50px-bottom xs-margin-30px-bottom">-->
    <!--            <h3 class="margin-10px-bottom">Our Blog</h3>-->
    <!--            <p class="no-margin-bottom">Lorem Ipsum is simply dummy printing </p>-->
    <!--        </div>-->
    <!--        <div class="row">-->
    <!--            <div class="col-lg-4 sm-margin-30px-bottom">-->
    <!--                <div class="h-100">-->
    <!--                    <img src="img/blog/blog-03.jpg" alt="" />-->
    <!--                    <div class="padding-25px-top padding-20px-lr">-->
    <!--                        <div-->
    <!--                            class="font-size12 text-uppercase text-theme-color font-weight-700 margin-10px-bottom letter-spacing-2">-->
    <!--                            January 22, 2020</div>-->
    <!--                        <h5 class="margin-30px-bottom sm-margin-20px-bottom font-size26 md-font-size24"><a-->
    <!--                                href="blog-details.html" class="text-extra-dark-gray">Mother world host your-->
    <!--                                travels</a></h5>-->
    <!--                        <a href="blog-details.html" class="font-weight-600">View Details<i-->
    <!--                                class="fas fa-arrow-right margin-10px-left vertical-align middle font-size12"></i></a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4 sm-margin-30px-bottom">-->
    <!--                <div class="h-100">-->
    <!--                    <img src="img/blog/blog-04.jpg" alt="" />-->
    <!--                    <div class="padding-25px-top padding-20px-lr">-->
    <!--                        <div-->
    <!--                            class="font-size12 text-uppercase text-theme-color font-weight-700 margin-10px-bottom letter-spacing-2">-->
    <!--                            February 2, 2020</div>-->
    <!--                        <h5 class="margin-30px-bottom sm-margin-20px-bottom font-size26 md-font-size24"><a-->
    <!--                                href="blog-details.html" class="text-extra-dark-gray">Food, wine with all-->
    <!--                                things permissive.</a></h5>-->
    <!--                        <a href="blog-details.html" class="font-weight-600">View Details<i-->
    <!--                                class="fas fa-arrow-right margin-10px-left vertical-align middle font-size12"></i></a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4">-->
    <!--                <div class="h-100">-->
    <!--                    <img src="img/blog/blog-05.jpg" alt="" />-->
    <!--                    <div class="padding-25px-top padding-20px-lr">-->
    <!--                        <div-->
    <!--                            class="font-size12 text-uppercase text-theme-color font-weight-700 margin-10px-bottom letter-spacing-2">-->
    <!--                            February 27, 2020</div>-->
    <!--                        <h5 class="margin-30px-bottom sm-margin-20px-bottom font-size26 md-font-size24"><a-->
    <!--                                href="blog-details.html" class="text-extra-dark-gray">Getting low-cost airfare-->
    <!--                                for last minute trip</a></h5>-->
    <!--                        <a href="blog-details.html" class="font-weight-600">View Details<i-->
    <!--                                class="fas fa-arrow-right margin-10px-left vertical-align middle font-size12"></i></a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- end blog section -->

    <!-- start extra section -->
    <!--<section class="no-padding">-->
    <!--    <div class="container-fluid no-padding">-->
    <!--        <div class="row no-gutters">-->
    <!--            <div class="col-lg-6">-->
    <!--                <div class="padding-ten-tb bg-img" data-overlay-dark="5" data-background="img/content/04.jpg">-->
    <!--                    <div class="position-relative z-index-1 text-center extra-1">-->
    <!--                        <h3 class="text-white">Restaurant & Food</h3>-->
    <!--                        <a href="#">-->
    <!--                            <h6 class="font-italic font-size17 text-white no-margin-bottom letter-spacing-1">-->
    <!--                                See what makes Fivestar<i-->
    <!--                                    class="fas fa-arrow-right margin-10px-left vertical-align middle font-size12"></i>-->
    <!--                            </h6>-->
    <!--                        </a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-6">-->
    <!--                <div class="padding-ten-tb bg-img" data-overlay-dark="5" data-background="img/content/05.jpg">-->
    <!--                    <div class="position-relative z-index-1 text-center extra-1">-->
    <!--                        <h3 class="text-white">Rooms & Apartments</h3>-->
    <!--                        <a href="#">-->
    <!--                            <h6 class="font-italic font-size17 text-white no-margin-bottom letter-spacing-1">-->
    <!--                                See what makes Fivestar<i-->
    <!--                                    class="fas fa-arrow-right margin-10px-left vertical-align middle font-size12"></i>-->
    <!--                            </h6>-->
    <!--                        </a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- end extra section -->
@endsection

@push('customScript')
    <script>
        $(document).ready(function() {

            function convertDate(date) {
                var dates = new Date(date);
                var yyyy = dates.getFullYear().toString();
                var mm = (dates.getMonth() + 1).toString();
                var dd = dates.getDate().toString();

                var mmChars = mm.split('');
                var ddChars = dd.split('');

                return yyyy + '-' + (mmChars[1] ? mm : "0" + mmChars[0]) + '-' + (ddChars[1] ? dd : "0" + ddChars[
                    0]);
            }

            $("#tgl").on('change', function() {
                var tgl = $(this).val();
                var tgl_convert = convertDate(tgl);
                $("#date").val(tgl_convert);
            });


            $("#btn-cari").click(function() {
                cariJadwal();
            });

            function cariJadwal() {
                $(".result").html('');
                var tanggal = $("#tanggal").val();
                tanggal = convertDate(tanggal);
                var gedung = $("#gedung").val();
                console.log(tanggal);
                field = $(".field").val();
                $.ajax({
                    type: "GET",
                    url: "api/cek-gedung?tanggal=" + tanggal + "&id_gedung=" + gedung,
                    success: function(data) {
                        console.log(data);
                        if (data.success) {
                            $(".result").html('<h5 class="text-center mb-0 pb-0 mr-3">' + data.message +
                                '</h5> <a href="{{ url('/booking') }}" class="btn btn-primary btn-sm">Lanjutkan Booking</a>'
                            );
                        } else {
                            $(".result").html('<h5 class="text-center mb-0 pb-0">' + data.message +
                                '</h5>');
                        }
                    }
                });
            }
        });
    </script>
@endpush
