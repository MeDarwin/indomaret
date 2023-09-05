@extends('layout.layout')
@section('title', 'Daftar Cabang')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Data Cabang Perusahaan
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="cabang/insert">
                                <btn class="btn btn-success">Tambah Cabang</btn>
                            </a>

                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAMA CABANG</th>
                                    <th>KODE CABANG</th>
                                    <th>ALAMAT</th>
                                    <th>KONTAK</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cabang as $c)
                                    <tr>
                                        <td class="col-auto">{{ $c->id_cabang }}</td>
                                        <td>{{ $c->nama }}</td>
                                        <td>{{ $c->kode_cabang }}</td>
                                        <td>{{ $c->alamat }}</td>
                                        <td>{{ $c->kontak_cabang }}</td>
                                        <td>
                                            <a href="cabang/edit/{{ $c->id_cabang }}" class="btn btn-primary">
                                                EDIT
                                            </a>
                                            <button type="button" class="btn btn-danger btnHapus"
                                                idCabang="{{ $c->id_cabang }}">
                                                HAPUS
                                            </button>
                                            <a href="cabang/detail/{{$c->id_cabang}}" class="btn btn-success">LIHAT</a>
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
            let idCabang = $(this).closest('.btnHapus').attr('idCabang');
            swal.fire({
            title : "Apakah anda ingin menghapus data ini?",
            showCancelButton: true,
            confirmButtonText: 'Setuju',
            cancelButtonText: `Batal`,
            confirmButtonColor: 'red'
            }).then((result)=>{
            if(result.isConfirmed){
                //dilakukan proses hapus
                axios.delete('cabang/delete/'+idCabang).then(({data})=>{
                    data.Success
                        ?swal.fire({
                            icon:'success',
                            timer:1500,
                            showConfirmButton:false,
                            title:'Cabang berhasil dihapus'
                        }).finally(function(){
                                //Refresh Halaman
                                location.reload();
                            })
                        :swal.fire({
                            icon:'warning',
                            timer:1500,
                            showConfirmButton:false,
                            title:'Cabang gagal dihapus'
                        }).finally(function(){
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
