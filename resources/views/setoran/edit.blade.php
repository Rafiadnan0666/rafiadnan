@extends('master.dash')
@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">Dashboard <span class="mx-1">></span></a></li>
    <li><a href="{{ route('setoran.index') }}">Setoran <span class="mx-1">></span></a></li>
    <li><a> Edit </a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Edit Data Setoran {{ $setoran->mahasantri->nama_mhs }}</h2>
@endsection
@section('konten')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 order-md-1 order-last">
                    <div style="float: right">
                        <a href="{{ route('setoran.index') }}">
                            <button class="btn btn-warning mt-2">
                                <i class="fa fa-arrow-circle-left"></i> Kembali
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content mt-4">
            <section class="section">
                <div class="row" id="basic-table">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    {{-- enctype="multi platform ngirim data harus ada ini" --}}
                                    <form action="{{ route('setoran.update', $setoran->id) }}" enctype="multipart/form-data"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <div class="row">
                                                <label for="mahasantri" class="col-md-2">Mahasantri</label>
                                                <select name="mahasantri" id="mahasantri"
                                                    class="custom-select mb-2 @error('mahasantri') is-invalid @enderror col-md-6">
                                                    <option value="" selected disabled>Select mahasantri</option>
                                                    @foreach ($mahasantri as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($item->id == $setoran->mahasantri_id) selected @endif>
                                                            {{ $item->nama_mhs }}</option>
                                                    @endforeach
                                                </select>
                                                @error('mahasantri')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label for="tanggal" class="col-md-2">Tanggal</label>
                                                <input type="date" value="{{ $setoran->tanggal }}" name="tanggal"
                                                    class="form-control mb-2 @error('tanggal') is-invalid @enderror col-md-6"
                                                    id="tanggal">
                                                @error('tanggal')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label for="juz" class="col-md-2">Juz</label>
                                                <input type="number" value="{{ $setoran->juz }}" name="juz"
                                                    class="form-control mb-2 @error('juz') is-invalid @enderror col-md-6"
                                                    id="juz" placeholder="Enter Juz">
                                                @error('juz')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label for="halaman" class="col-md-2">Halaman</label>
                                                <input type="number" value="{{ $setoran->halaman }}" name="halaman"
                                                    class="form-control mb-2 @error('halaman') is-invalid @enderror col-md-6"
                                                    id="halaman" placeholder="Enter Halaman">
                                                @error('halaman')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label for="nilai" class="col-md-2">Nilai</label>
                                                <input type="number" value="{{ $setoran->nilai }}" name="nilai"
                                                    class="form-control mb-2 @error('nilai') is-invalid @enderror col-md-6"
                                                    id="nilai" placeholder="Enter Nilai">
                                                @error('nilai')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label for="keterangan" class="col-md-2">Keterangan</label>
                                                <input type="text" value="{{ old('keterangan') }}" name="keterangan"
                                                    class="form-control mb-2 @error('keterangan') is-invalid @enderror col-md-6"
                                                    id="keterangan" placeholder="Enter Keterangan">
                                                @error('keterangan')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <button class="btn btn-primary mt-3" type="submit">
                                            <i class="fas fa-save"></i> Update
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
