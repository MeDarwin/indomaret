@extends('layout.layout')
@section('title', 'Data Perusahaan')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Data Perusahaan</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            Nama Perusahaan
                        </div>
                        <div class="col-md-1">
                            :
                        </div>
                        <div class="col-md-6">
                            {{ $perusahaan->nama }}
                        </div>
                        <div class="col-md-5">
                            Alamat
                        </div>
                        <div class="col-md-1">
                            :
                        </div>
                        <div class="col-md-6">
                            {{ $perusahaan->alamat }}
                        </div>
                        <div class="col-md-5">
                            NPWP
                        </div>
                        <div class="col-md-1">
                            :
                        </div>
                        <div class="col-md-6">
                            {{ $perusahaan->npwp }}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="perusahaan/edit" class="btn btn-success px-4">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
