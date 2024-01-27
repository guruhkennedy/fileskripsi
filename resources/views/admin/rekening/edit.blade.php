@extends('admin.layouts.app')
@section('title', 'Edit Rekening')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-body">
            <h4 class="section-title">Edit Rekening</h4>
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
                                </div>
                            </div>
                            <form method="post" action="{{ route('rekening.update', $rekening) }}">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="id_bank" class="form-label">Nama Bank</label>
                                            <select name="id_bank" id="id_bank" class="form-control">
                                                <option value="">Pilih Bank</option>
                                                @foreach ($banks as $bank)
                                                    <option @if ($rekening->id_bank == $bank->id) selected @endif
                                                        value="{{ $bank->id }}">{{ $bank->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_bank')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="no_rekening" class="form-label">No Rekening</label>
                                            <input type="text" class="form-control" id="no_rekening" name="no_rekening"
                                                value="{{ $rekening->no_rekening }}">
                                            @error('no_rekening')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="atas_nama" class="form-label">Atas Nama</label>
                                            <input type="text" class="form-control" id="atas_nama" name="atas_nama"
                                                value="{{ $rekening->atas_nama }}">
                                            @error('atas_nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="cabang" class="form-label">Cabang</label>
                                            <input type="text" class="form-control" id="cabang" name="cabang"
                                                value="{{ $rekening->cabang }}">
                                            @error('cabang')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="Aktif" @if ($rekening->status == 'Aktif') selected @endif>
                                                    Aktif</option>
                                                <option value="Tidak Aktif"
                                                    @if ($rekening->status == 'Tidak Aktif') selected @endif>Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer float-end">
                                    <div>
                                        <button type="submit" class="btn btn-icon icon-left btn-ungu">Save</button>
                                        <a class="btn btn-secondary" href="{{ route('rekening.index') }}">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
