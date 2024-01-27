@extends('layouts.app')

@section('title', 'Cek Jadwal')

@section('content')
    <!-- start page title section -->
    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="">
        <div class="container">
            <h1>Cek Jadwal</h1>
            <ul>
                <li>
                    <a href="index.html">Beranda</a>
                </li>
                <li>
                    <a href="#!">Cek Jadwal</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- end page title section -->

    <!-- start gallery section -->
    <section>
        <div class="container">
            <div class="row">
                <div class="width-100">
                    <div id='calendar'></div>
                    <br>
                </div>
            </div>
        </div>
    </section>
    <!-- end gallery section -->
@endsection

@push('customStyle')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@endpush

@push('customScript')
    <!-- <script src="https://code.jquery.com/jquery-1.11.3.js"></script> -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                header: {
                    left: 'title',
                    center: '',
    
                },
                eventSources: [
                    @foreach ($gedungs as $gedung)
                        {
                            events: [
                                @foreach ($gedung['dates'] as $date)
                                    @if(!$date['status'])
                                        {
                                            title: "Sudah dipesan",
                                            start: "{{ $date['date']}}",
                                            // url: "{!! $date['url'] !!}",
                                        },
                                    @endif
                                @endforeach
                            ],
                            color: "red",
                            textColor: 'white',
                        },
                    @endforeach
                ],
                eventColor: '#378006',
                // eventTextColor: '#fff',#
                displayEventTime: false
            })
        });
    </script>
@endpush
