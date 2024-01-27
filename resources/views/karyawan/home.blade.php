@extends('karyawan.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-body">
            <h4 class="section-title">Dashboard</h4>
            <div class="row">
                <div class="col-12">
                    @include('karyawan.layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
    <!-- <script src="https://code.jquery.com/jquery-1.11.3.js"></script> -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events: [
                    @foreach ($tasks as $task)
                        {
                            title: '{{ $task->nama }}',
                            start: '{{ $task->tanggal }}',
                            url: "{{ url('order?kode=' . $task->kode) }}"
                        },
                    @endforeach
                ]
            })
        });
    </script>
@endpush
