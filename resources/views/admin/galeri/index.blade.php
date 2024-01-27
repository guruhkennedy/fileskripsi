@extends('admin.layouts.app')
@section('title', 'List Galeri')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-body">
            <h4 class="section-title">List Galeri</h4>
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
                                                href="{{ route('galeri.create') }}">Tambah</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <tbody>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Foto</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                            @foreach ($galeries as $key => $galeri)
                                                <tr class="align-middle">
                                                    <td class="text-center">
                                                        {{ ($galeries->currentPage() - 1) * $galeries->perPage() + $key + 1 }}
                                                    </td>
                                                    <td class="text-center"><img
                                                            src="{{ asset('img/gedung/' . $galeri->url) }}"
                                                            tag="{{ $galeri->tag }}" style="height:200px;width:300px;" />
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="d-flex justify-content-end">
                                                            <a href="{{ route('galeri.edit', $galeri->id) }}"
                                                                class="btn btn-sm btn-oren btn-icon me-2"><i
                                                                    class="fa fa-edit"></i>
                                                                Edit</a>
                                                            <form action="{{ route('galeri.destroy', $galeri->id) }}"
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
                                    {{ $galeries->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
