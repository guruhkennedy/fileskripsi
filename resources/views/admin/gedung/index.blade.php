@extends('admin.layouts.app')
@section('title', 'List Gedung')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-body">
            <h4 class="section-title">List Gedung</h4>
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
                                                href="{{ route('gedung.create') }}">Tambah</a>
                                        </div>
                                    </div>
                                    <div class="col-8 col-md-4 ms-auto">
                                        <form id="search" method="GET" action="{{ route('gedung.index') }}">
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
                                                <th>Name</th>
                                                <th>Harga</th>
                                                <th>Foto</th>
                                                <th>Status</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                            @foreach ($gedungs as $key => $gedung)
                                                <tr class="align-middle">
                                                    <td class="text-center">
                                                        {{ ($gedungs->currentPage() - 1) * $gedungs->perPage() + $key + 1 }}
                                                    </td>
                                                    <td>{{ $gedung->nama }}</td>
                                                    <td>@currency($gedung->harga)</td>
                                                    <td><img src="{{ asset('img/produk/'. $gedung->foto) }}" tag="{{ $gedung->nama }}" style="height:70px;width:100px;" /></td>
                                                    <td><span class='badge {{$gedung->status == 1 ? 'bg-warning text-dark' : 'bg-danger'}}'>{{$gedung->status == 1 ? 'Aktif' : 'Tidak Aktif'}}</span></td>
                                                    <td class="text-end">
                                                        <div class="d-flex justify-content-end">
                                                            <a href="{{ route('gedung.edit', $gedung->id) }}"
                                                                class="btn btn-sm btn-oren btn-icon me-2"><i
                                                                    class="fa fa-edit"></i>
                                                                Edit</a>
                                                            <form action="{{ route('gedung.destroy', $gedung->id) }}"
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
                                    {{ $gedungs->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection