@extends('admin.layouts.app')
@section('title', 'Syarat & Ketentuan')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-body">
            <h4 class="section-title">Syarat & Ketentuan</h4>
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
                            <form method="post" action="{{ route('sk.website.update', $site) }}">
                                @method('patch')
                                @csrf
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <textarea type="text" class="ckeditor form-control" id="sk" name="sk" rows="15">{{ $site->sk }}</textarea>
                                            @error('sk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer float-end">
                                    <div>
                                        <button type="submit" class="btn btn-icon icon-left btn-ungu">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection

@push('customScript')
    <script>
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
@endpush
