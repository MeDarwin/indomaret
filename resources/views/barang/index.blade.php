@extends('layout.layout')
@section('title', 'Daftar Barang')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Data Barang
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="barang/insert">
                                <btn class="btn btn-success">Tambah Barang</btn>
                            </a>
                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>NAMA BARANG</th>
                                    <th>BARCODE</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $b)
                                    <tr>
                                        <td>{{ $b->nama_barang }}</td>
                                        <td>{{ $b->barcode }}</td>
                                        <td>
                                            <a href="barang/edit/{{ $b->id_barang }}" class="btn btn-primary">
                                                EDIT
                                            </a>
                                            <button type="button" class="btn btn-danger btnHapus"
                                                idBarang="{{ $b->id_barang }}">HAPUS</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script type="module">
        $('.DataTable').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idBarang = $(this).closest('.btnHapus').attr('idBarang');
            swal.fire({
            title : "Apakah anda ingin menghapus data ini?",
            showCancelButton: true,
            confirmButtonText: 'Setuju',
            cancelButtonText: `Batal`,
            confirmButtonColor: 'red'
            }).then((result)=>{
            if(result.isConfirmed){
                //dilakukan proses hapus
                axios.delete('barang/delete/'+idBarang).then(({data})=>{
                    data.Success
                        ?swal.fire({
                            icon:'success',
                            timer:1500,
                            showConfirmButton:false,
                            title:'Barang berhasil dihapus'
                        }).then(function(){
                                //Refresh Halaman
                                location.reload();
                            })
                        :swal.fire({
                            icon:'warning',
                            timer:1500,
                            showConfirmButton:false,
                            title:'Barang gagal dihapus'
                        }).then(function(){
                                //Refresh Halaman
                                location.reload();
                            });
                }).catch(function(error){
                    swal.fire('Data gagal di hapus!', '', 'error').then(function(){
                                //Refresh Halaman
                            });
                });
            }
        });
    });
        $(document).ready(function() {
            $('.DataTable').dataTable();
        })
    </script>

@endsection
