@extends('layout.layout')
@section('title', 'Tambah Barang ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah data Barang
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="add">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" />
                                </div>
                                <div class="form-group">
                                    <label>Barcode</label>
                                    <input type="text" class="form-control" name="barcode" />
                                </div>
                                @csrf
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success">SIMPAN</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
