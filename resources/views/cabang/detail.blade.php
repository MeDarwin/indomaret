@extends('layout.layout')
@section('title', "$cabang->nama")
@section('content')
    {{-- @csrf --}}

    {{-- /* -------------------------- CABANG SECTION -------------------------- */ --}}
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/dashboard') }}/cabang/edit/{{ $cabang->id_cabang }}"
                        class="h1 link-success link-underline-opacity-75 link-offset-2">
                        {{ $cabang->nama }}
                    </a>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-2">
                            Kode cabang
                        </div>
                        <div class="col-md-auto">
                            :
                        </div>
                        <div class="col-md-9">
                            {{ $cabang->kode_cabang }}
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2">
                            Kontak cabang
                        </div>
                        <div class="col-md-auto">
                            :
                        </div>
                        <div class="col-md-9">
                            {{ $cabang->kontak_cabang }}
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2">
                            Alamat cabang
                        </div>
                        <div class="col-md-auto">
                            :
                        </div>
                        <div class="col-md-9">
                            {{ $cabang->alamat }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- /* -------------------------- CABANG SECTION -------------------------- */ --}}

    {{-- /* ---------------------------- BTN-SHOW-TAMBAH-BARANG --------------------------- */ --}}
    <div>
        <button class="btnClose btnShow btn btn-outline-dark m-0 mb-3 text-wrap" style="display: none">Tambah
            barang</button>
    </div>
    {{-- /* ---------------------------- BTN-SHOW-TAMBAH-BARANG --------------------------- */ --}}

    <div class="row row-gap-5 mb-5">
        {{-- /* -------------------------- TAMBAH BARANG  CABANG -------------------------- */ --}}
        <div class=" me-1 col-xl-5" id="tambah">
            <div class="card p-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1 class="h1">Tambah barang cabang</h1>
                    <button type="button" class="btnClose col-auto btn fw-bold px-3 py-1" title="toggle show">X</button>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered DataTable-1">
                        <thead>
                            <tr>
                                <th>NAMA BARANG</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_unadded_barang as $a)
                                <tr>
                                    <td class="text-capitalize">{{ $a->nama_barang }}</td>
                                    <td class="d-flex justify-content-center">
                                        <button class="btnTambah btn btn-primary"
                                            idBarang={{ $a->id_barang }}>Tambah</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- /* -------------------------- TAMBAH BARANG  CABANG -------------------------- */ --}}

        {{-- /* -------------------------- KELOLA BARANG CABANG  -------------------------- */ --}}
        <div class="col-xl">
            <div class="card p-0">
                <div class="card-header">
                    <h1 class="h1 mb-1">Kelola barang cabang</h1>
                    <p class="m-0">Table column is editable, click anywhere after edit to save!<i
                            class="text-danger ms-1">*</i></p>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered DataTable-2">
                        <thead>
                            <tr>
                                <th>NAMA BARANG</th>
                                <th>STOK</th>
                                <th>HARGA</th>
                                <th>ATUR STOK</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_available_barang as $s)
                                <tr>
                                    <td class="col-5 col-xxl-auto">
                                        <div class="row column-gap-2 p-2 px-4">
                                            <p class="col align-self-center text-capitalize m-0">
                                                {{ $s->barang->nama_barang }}</p>
                                            <button class="btnHapus col-auto btn btn-outline-danger"
                                                idBarang="{{ $s->barang->id_barang }}"
                                                namaBarang="{{ $s->barang->nama_barang }}">Delete</button>
                                        </div>
                                    </td>
                                    <td class="col-2">
                                        <div class="row p-2 px-4">
                                            <input type="number" class="stok form-control" value="{{ $s->stok }}">
                                        </div>
                                    </td>
                                    <td class="col-3">
                                        <div class="row input-group p-2 m-0">
                                            <span class="input-group-text col-auto">Rp.</span>
                                            <input type="number" class="col form-control" value="{{ $s->harga }}">
                                        </div>
                                    </td>
                                    <td class="col-auto col-lg-3">
                                        <div class="row justify-content-between p-2 px-4">
                                            <button type="button" class="tStok col-auto btn btn-success"
                                                title="Tambah stok" value="{{ $s->stok }}"
                                                idBarang="{{ $s->barang->id_barang }}">
                                                + </button>
                                            <button type="button" class="mStok col-auto btn btn-danger"
                                                title="Kurangi stok" value="{{ $s->stok }}"
                                                idBarang="{{ $s->barang->id_barang }}">
                                                -
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- /* -------------------------- KELOLA BARANG  CABANG -------------------------- */ --}}
    </div>

    {{-- /* -------------------------- TAMBAH BARANG SECTION -------------------------- */ --}}

    {{-- /* -------------------------- TAMBAH BARANG SECTION -------------------------- */ --}}
@endsection

@section('footer')
    {{-- ! NEEDS TO REFACTOR --}}
    <script type="module">
        let idBarang;
        let namaBarang;
        // init
        $('.DataTable-1').dataTable();
        $('.DataTable-2').dataTable()

        function queryToStok(valuetoSend, idBar) {
            return axios.post(`/dashboard/stok/add/to/{{ $cabang->id_cabang }}/barang/${idBar}`, valuetoSend)
        }

        //INPUTS
        $('.tStok').click((e) => {
            queryToStok({
                stok: ++e.target.value,
                id_barang: $(e.delegateTarget).attr('idBarang')
            }).then(({
                data
            }) => {
                data.Success &&
                    swal.fire({
                        icon: 'success',
                        timer: 800,
                        showConfirmButton: false,
                        title: 'Stok berhasil ditambahkan'
                    })
                $(e.delegateTarget).siblings().val(e.target.value)
                $(e.delegateTarget).parents().closest('tr').find('.stok').val((e.target.value))
            }).catch((err) => {
                --e.target.value //rollback
                console.error(err)
                swal.fire({
                    icon: 'error',
                    timer: 1000,
                    showConfirmButton: false,
                    title: 'Stok gagal ditambahkan'
                })
            })
        })
        $('.mStok').click((e) => {
            queryToStok({
                stok: --e.target.value,
                id_barang: $(e.delegateTarget).attr('idBarang')
            }).then(({
                data
            }) => {
                data.Success &&
                    swal.fire({
                        icon: 'success',
                        timer: 800,
                        showConfirmButton: false,
                        title: 'Stok berhasil dikurangi'
                    })
                $(e.delegateTarget).siblings().val(e.target.value)
                $(e.delegateTarget).parents().closest('tr').find('.stok').val(e.target.value)
            }).catch((err) => {
                ++e.target.value //rollback
                console.error(err)
                swal.fire({
                    icon: 'error',
                    timer: 1000,
                    showConfirmButton: false,
                    title: 'Stok gagal ditambahkan'
                })
            })
        })

        //hapus barang
        $('.btnHapus').on('click',
            function() {
                namaBarang = $(this).attr('namaBarang')
                idBarang = $(this).attr('idBarang')
                swal.fire({
                        icon: 'question',
                        title: `Apakah anda yakin untuk menghapus ${namaBarang}`,
                        showCancelButton: true
                    }).then(({
                        isConfirmed
                    }) => isConfirmed && axios.delete(
                        `/dashboard/stok/delete/from/{{ $cabang->id_cabang }}/barang/${idBarang}`))
                    .then(({
                            data
                        }) => data.Success &&
                        swal.fire({
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false,
                            title: 'Barang berhasil dihapus'
                        }).finally(() => location.reload())
                    ).catch(() =>
                        swal.fire({
                            icon: 'warning',
                            timer: 2000,
                            showConfirmButton: false,
                            title: 'Barang tidak dihapus'
                        }))
                    .catch((err) => console.error(error))
            })
        //tambah barang
        $('.btnTambah').on('click',
            (e) => swal.fire({
                title: 'Masukkan harga',
                input: 'number',
                inputLabel: 'Harga',
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) return 'Tolong masukkan harga!'
                }
            }).then(
                ({
                    isConfirmed,
                    value: harga
                }) =>
                isConfirmed &&
                axios.post(
                    `/dashboard/stok/add/to/{{ $cabang->id_cabang }}/barang/${$(e.delegateTarget).attr('idBarang')}`, {
                        harga: harga
                    })
                .then(({
                    data
                }) => {
                    data.Success &&
                        swal.fire({
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false,
                            title: 'Barang berhasil ditambahkan'
                        }).finally(function() {
                            //Refresh Halaman
                            location.reload();
                        })
                })
                .catch((err) => console.error(err))
            ))
        //close btn
        $('.btnClose').on('click',
            () => {
                $('.btnShow').is(':hidden') ?
                    $('.btnShow').slideDown() :
                    $('.btnShow').slideUp()
                $('#tambah').is(':hidden') ?
                    $('#tambah').slideDown() :
                    $('#tambah').slideUp()
            })
    </script>
@endsection
