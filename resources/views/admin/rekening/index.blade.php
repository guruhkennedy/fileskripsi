@extends('admin.layouts.app')
@section('title', 'List Rekening')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-body">
            <h4 class="section-title">List Rekening</h4>
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
                                        <div class="">
                                            <a class="btn btn-icon icon-left btn-ungu"
                                                href="{{ route('rekening.create') }}">Tambah</a>
                                        </div>
                                    </div>
                                    <div class="col-8 col-md-4 ms-auto">
                                        <form id="search" method="GET" action="{{ route('rekening.index') }}">
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
                                                <th>Nama Bank</th>
                                                <th>Nomor Rekening</th>
                                                <th>Atas Nama</th>
                                                <th>Cabang</th>
                                                <th>Status</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                            @foreach ($rekenings as $key => $rekening)
                                                <tr class="align-middle">
                                                    <td class="text-center">
                                                        {{ ($rekenings->currentPage() - 1) * $rekenings->perPage() + $key + 1 }}
                                                    </td>
                                                    <td>{{ $rekening->nama }}</td>
                                                    <td>{{ $rekening->no_rekening }}</td>
                                                    <td>{{ $rekening->atas_nama }}</td>
                                                    <td>{{ $rekening->cabang }}</td>
                                                    <td><span
                                                            class='badge {{ $rekening->status == 'Aktif' ? 'bg-warning text-dark' : 'bg-danger' }}'>{{ $rekening->status }}</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="d-flex justify-content-end">
                                                            <a href="{{ route('rekening.edit', $rekening->id) }}"
                                                                class="btn btn-sm btn-oren btn-icon me-2"><i
                                                                    class="fa fa-edit"></i>
                                                                Edit</a>
                                                            <form action="{{ route('rekening.destroy', $rekening->id) }}"
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
                                    {{ $rekenings->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
