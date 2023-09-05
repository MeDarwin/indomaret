@extends('layout.layout')
@section('title', "Edit Perusahaan $perusahaan->nama")
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Data Perusahaan
                    </span>
                </div>
                <form method="POST" action="update">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group spacer">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Nama Perusahaan</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="hidden" name="id_perusahaan" value="{{ $perusahaan->id_perusahaan }}" />
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $perusahaan->nama }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group spacer">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Alamat</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="alamat"
                                            value="{{ $perusahaan->alamat }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group spacer">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Nomor Pokok Wajib Pajak</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" class="form-control" name="npwp"
                                            value="{{ $perusahaan->npwp }}" />
                                        @csrf
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class=""></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
