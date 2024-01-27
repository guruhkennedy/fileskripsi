@extends('admin.layouts.app')
@section('title', 'Pengaturan Website')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-body">
            <h4 class="section-title">Pengaturan Website</h4>
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
                            <form method="post" action="{{ route('admin.website.update', $site) }}" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Nama Website</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$site->name}}" required>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{$site->email}}" required>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">No HP</label>
                                        <input type="phone" class="form-control" id="phone" name="phone" value="{{$site->phone}}" required>
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="description" class="form-label">Deskripsi</label>
                                        <input type="text" class="form-control" id="description" name="description" value="{{$site->description}}" required>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="address" class="form-label">Alamat</label>
                                        <textarea type="text" class="form-control" id="address" name="address" rows="5">{{$site->address}}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="mb-3">
                                            <label for="facebook" class="form-label">Facebook</label>
                                            <input type="text" class="form-control" id="facebook" name="facebook" value="{{$site->facebook}}">
                                            @error('facebook')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="twitter" class="form-label">Twitter</label>
                                            <input type="text" class="form-control" id="twitter" name="twitter" value="{{$site->twitter}}">
                                            @error('twitter')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                    <label for="about" class="form-label">Tentang</label>
                                        <textarea type="text" class="form-control" id="about" name="about" rows="5">{{$site->about}}</textarea>
                                        @error('about')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="mb-3">
                                            <label for="instagram" class="form-label">Instagram</label>
                                            <input type="text" class="form-control" id="instagram" name="instagram" value="{{$site->instagram}}">
                                            @error('instagram')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="whatsapp" class="form-label">Whatsapp</label>
                                            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{$site->whatsapp}}">
                                            @error('whatsapp')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="logo" class="form-label">Ubah Logo</label>
                                        <input type="file" class="form-control" id="logo" name="logo" value="{{$site->logo}}">
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="favicon" class="form-label">Ubah Favicon</label>
                                        <input type="file" class="form-control" id="favicon" name="favicon" value="{{$site->favicon}}">
                                        @error('favicon')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer float-end">
                                <div>
                                    <button type="submit" class="btn btn-icon icon-left btn-ungu">Ubah Pengaturan</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection