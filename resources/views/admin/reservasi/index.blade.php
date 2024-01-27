@extends('admin.layouts.app')
@section('title', 'List Reservasi')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-body">
            <h4 class="section-title">List Reservasi</h4>
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
                                        <form id="search" method="GET" action="{{ route('reservasi.index') }}">
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
                                                <th>Kode</th>
                                                <th>Name</th>
                                                <th>No HP</th>
                                                <th>Total</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                            @foreach ($reservasis as $key => $reservasi)
                                                @php
                                                    if ($reservasi->status == 0) {
                                                        $text = 'Menunggu Pembayaran';
                                                        $color = 'bg-primary';
                                                        $icon = 'far fa-hourglass';
                                                    } elseif ($reservasi->status == 1) {
                                                        $text = 'Berhasil';
                                                        $color = 'bg-warning';
                                                        $icon = 'far fa-check-circle';
                                                    } elseif ($reservasi->status == 2) {
                                                        $text = 'Dibayar';
                                                        $color = 'bg-info';
                                                        $icon = 'far fa-clock';
                                                    } elseif ($reservasi->status == 3) {
                                                        $text = 'Batal';
                                                        $color = 'bg-danger';
                                                        $icon = 'far fa-times-circle';
                                                    }
                                                @endphp
                                                <tr class="align-middle">
                                                    <td class="text-center">
                                                        {{ ($reservasis->currentPage() - 1) * $reservasis->perPage() + $key + 1 }}
                                                    </td>
                                                    <td>{{ $reservasi->kode }}</td>
                                                    <td>{{ $reservasi->nama }}</td>
                                                    <td>{{ $reservasi->no_hp }}</td>
                                                    <td>@currency($reservasi->total)</td>
                                                    <td>@dateonly($reservasi->tanggal)</td>
                                                    <td><span class="badge {{ $color }}">{{ $text }}</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="d-flex justify-content-end">
                                                            <a href="{{ url('order?kode=' . $reservasi->kode) }}"
                                                                class="btn btn-sm btn-oren btn-icon me-2" target="_blank"><i
                                                                    class="fa fa-eye"></i>
                                                                Lihat</a>
                                                            @if ($reservasi->status == 2)
                                                                <form class="me-2"
                                                                    action="{{ route('reservasi.proses', $reservasi->id) }}"
                                                                    method="POST">
                                                                    <input type="hidden" name="_method" value="POST">
                                                                    <input type="hidden" name="_token"
                                                                        value="{{ csrf_token() }}">
                                                                    <button class="btn btn-sm btn-info btn-icon "><i
                                                                            class="fa fa-check"></i> Proses </button>
                                                                </form>

                                                                {{-- <form class="me-2"
                                                                action="{{ route('karyawan.reservasi.proses_upload_ulang', $reservasi->id) }}"
                                                                method="POST">
                                                                <input type="hidden" name="_method" value="POST">
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}">
                                                                <button class="btn btn-sm btn-primary btn-icon "> Upload ulang </button>
                                                            </form> --}}
                                                            @endif
                                                            <form action="{{ route('reservasi.destroy', $reservasi->id) }}"
                                                                method="POST">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}">
                                                                <button class="btn btn-sm btn-danger btn-icon "><i
                                                                        class="fa fa-times"></i> Delete </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $reservasis->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
