@extends('admin.layouts.app')
@section('title', 'List Reservasi')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-body">
            <h4 class="section-title">List Pembatalan</h4>
            <div class="row">
                <div class="col-12">
                    @include('admin.layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="card-header-action">
                                <div class="row">
                                    <div class="col-4">

                                    </div>
                                    <div class="col-8 col-md-4 ms-auto">
                                        <form id="search" method="GET" action="{{ route('pembatalan.index') }}">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="cari...">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <tbody>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Kode Booking</th>
                                                <th>Alasan</th>
                                                <th>Tanggal Reservasi</th>
                                                <th>Status Reservasi</th>
                                                <th>Status Pembatalan</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                            @foreach ($pembatalans as $key => $pembatalan)
                                                @php
                                                    if ($pembatalan->status_reservasi == 0) {
                                                        $text = 'Menunggu Pembayaran';
                                                        $color = 'bg-primary';
                                                        $icon = 'far fa-hourglass';
                                                    } elseif ($pembatalan->status_reservasi == 1) {
                                                        $text = 'Berhasil';
                                                        $color = 'bg-warning';
                                                        $icon = 'far fa-check-circle';
                                                    } elseif ($pembatalan->status_reservasi == 2) {
                                                        $text = 'Dibayar';
                                                        $color = 'bg-info';
                                                        $icon = 'far fa-clock';
                                                    } elseif ($pembatalan->status_reservasi == 3) {
                                                        $text = 'Batal';
                                                        $color = 'bg-danger';
                                                        $icon = 'far fa-times-circle';
                                                    }
                                                @endphp
                                                <tr class="align-middle">
                                                    <td class="text-center">
                                                        {{ ($pembatalans->currentPage() - 1) * $pembatalans->perPage() + $key + 1 }}
                                                    </td>
                                                    <td>{{ $pembatalan->kode }}</td>
                                                    <td>{{ $pembatalan->alasan }}</td>
                                                    <td>@dateonly($pembatalan->tanggal)</td>
                                                    <td><span class="badge {{ $color }}">{{ $text }}</span>
                                                    <td>
                                                        <span
                                                            class="badge {{ $pembatalan->status == 0 ? 'bg-primary' : ($pembatalan->status == 1 ? 'bg-warning' : 'bg-danger') }}">
                                                            {{ $pembatalan->status == 0 ? 'Menunggu' : ($pembatalan->status == 1 ? 'Disetujui' : 'Ditolak') }}
                                                        </span>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="d-flex justify-content-end">
                                                            @if ($pembatalan->status == 0)
                                                                <form class="me-2"
                                                                    action="{{ route('pembatalan.terima', $pembatalan->id) }}"
                                                                    method="POST">
                                                                    @method('PATCH')
                                                                    <input type="hidden" name="_token"
                                                                        value="{{ csrf_token() }}">
                                                                    <button class="btn btn-sm btn-warning btn-icon "><i
                                                                            class="fa fa-check"></i> Terima </button>
                                                                </form>
                                                                <form class="me-2"
                                                                    action="{{ route('pembatalan.tolak', $pembatalan->id) }}"
                                                                    method="POST">
                                                                    @method('PATCH')
                                                                    <input type="hidden" name="_token"
                                                                        value="{{ csrf_token() }}">
                                                                    <button class="btn btn-sm btn-danger btn-icon "><i
                                                                            class="fa fa-times"></i> Tolak </button>
                                                                </form>
                                                            @endif
                                                            <form
                                                                action="{{ route('reservasi.destroy', $pembatalan->id) }}"
                                                                method="POST">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}">
                                                                <button class="btn btn-sm btn-info btn-icon "><i
                                                                        class="fa fa-trash"></i> Hapus </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $pembatalans->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
