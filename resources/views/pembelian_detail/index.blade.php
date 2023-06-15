@extends('layouts.template_index')

@section('header', 'Transaksi Pembelian')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <style>
        .tampil-bayar {
            font-size: 5em;
            text-align: center;
            height: 100px;
        }

        .tampil-terbilang {
            padding: 10px;
            background: #f0f0f0;
        }

        .table-pembelian tbody tr:last-child {
            display: none;
        }

        @media(max-width: 768px) {
            .tampil-bayar {
                font-size: 3em;
                height: 70px;
                padding-top: 5px;
            }
        }
    </style>
@endsection

@section('content')
    <div id="controller">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <table>
                                <tr>
                                    <td>Supplier</td>
                                    <td>:{{ $supplier->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td>:{{ $supplier->telepon }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:{{ $supplier->alamat }}</td>
                                </tr>
                            </table>

                        </div>

                        <div class="card-body table-responsive">
                            <form class="form-produk" method="post">
                                @csrf
                                <div class="row">
                                    <label for="kode_produk">Kode Produk</label>
                                    <div class="col-md-5">
                                        <div class="input-group mb-3">
                                            <input type="hidden" name="id_pembelian" id="id_pembelian"
                                                value="{{ $id_pembelian }}">
                                            <input type="hidden" name="produk_id" id="produk_id">
                                            <input type="text" name="kode_produk" id="kode_produk" class="form-control">
                                            <div class="input-group-prepend">
                                                <button type="button" onclick="tampilProduk()"
                                                    class="btn btn-warning btn-flat"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table id="example1" class="table table-bordered table-pembelian">
                                <thead>
                                    <tr>
                                        <th style="width: 10px" class="text-center">No.</th>
                                        <th class="text-center">Kode Produk</th>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Harga Beli</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Subtotal</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                            </table>

                            <div class="row mt-3">
                                <div class="col-lg-8">
                                    <div class="tampil-bayar bg-danger"></div>
                                    <div class="tampil-terbilang"></div>
                                </div>
                                <div class="col-lg-4">
                                    <form action="{{ route('pembelian.store') }}" method="post" class="form-pembelian">
                                        @csrf
                                        <div class="box-body">
                                            <input type="hidden" name="id_pembelian" value="{{ $id_pembelian }}">
                                            <input type="hidden" name="total" id="total">
                                            <input type="hidden" name="total_item" id="total_item">
                                            <input type="hidden" name="bayar" id="bayar">


                                            <div class="form-group row">
                                                <label for="totalrp" class="col-lg control-label">Total</label>
                                                <div class="col-lg-8">
                                                    <input type="text" id="totalrp" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="diskon" class="col-lg control-label">Diskon</label>
                                                <div class="col-lg-8">
                                                    <input type="number" name="diskon" id="diskon" class="form-control"
                                                        value="{{ $diskon }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="bayar" class="col-lg control-label">Bayar</label>
                                                <div class="col-lg-8">
                                                    <input type="text" id="bayarrp" class="form-control">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary btn-sm btn-flat btn-simpan"
                                                style="float: right;"><i class="fas fa-save"></i> Simpan Transaksi</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    @includeIf('pembelian_detail.produk')
@endsection

@section('js')
    <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script src="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
        $(function() {
            table = $('.table-pembelian').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('pembelian_detail.data', $id_pembelian) }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false,
                        class: 'text-center'
                    },
                    {
                        data: 'kode_produk',
                        class: 'text-center'
                    },
                    {
                        data: 'nama_produk',
                        class: 'text-center'
                    },
                    {
                        data: 'harga_beli',
                        class: 'text-center'
                    },
                    {
                        data: 'jumlah',
                        class: 'text-center'
                    },
                    {
                        data: 'subtotal',
                        class: 'text-center'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false,
                        class: 'text-center'
                    },
                ],
                // dom: 'Brt',
                bSort: false,
                paginate: false
            }).on('draw.dt', function() {
                loadForm($('#diskon').val());
            });

            $('.table-supplier').DataTable();

            $(document).on('input', '.jumlah', function() {
                let id = $(this).data('id');
                let jumlah = parseInt($(this).val());

                $.post(`{{ url('/pembelian_detail') }}/${id}`, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'put',
                        'jumlah': jumlah
                    })
                    .done(response => {
                        $(this).on('mouseout', function() {
                            table.ajax.reload(() => loadForm($('#diskon').val()));
                        });
                    })
                    .fail(errors => {
                        alert('Tidak dapat menyimpan data');
                        return;
                    });

            });

            $(document).on('input', '#diskon', function() {
                if ($(this).val() == "") {
                    $(this).val(0).select();
                }

                loadForm($(this).val());
            });

            $('.btn-simpan').on('click', function() {
                $('.form-pembelian').submit();
            });
        });

        function tampilProduk() {
            $('#modal-produk').modal('show');
        }

        function hideProduk() {
            $('#modal-produk').modal('hide');
        }

        function pilihProduk(id, kode) {
            $('#produk_id').val(id);
            $('#kode_produk').val(kode);
            hideProduk();
            tambahProduk();
        }

        function tambahProduk() {
            $.post('{{ route('pembelian_detail.store') }}', $('.form-produk').serialize())
                .done(response => {
                    $('#kode_produk').focus();
                    table.ajax.reload(() => loadForm($('#diskon').val()));
                }).fail(errors => {
                    alert('Tidak dapat menyimpan data');
                    return;
                });
        }

        function deleteData(url) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                $.post(url, {
                        '_token': '{{ csrf_token() }}',
                        '_method': 'delete',
                    })
                    .done((response) => {
                        table.ajax.reload(() => loadForm($('#diskon').val()));
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menghapus data');
                        return;
                    });
            }
        }

        function loadForm(diskon = 0) {
            $('#total').val($('.total').text());
            $('#total_item').val($('.total_item').text());

            $.get(`{{ url('/pembelian_detail/loadform') }}/${diskon}/${$('.total').text()}`)
                .done(response => {
                    $('#totalrp').val('Rp. ' + response.totalrp);
                    $('#bayarrp').val('Rp. ' + response.bayarrp);
                    $('#bayar').val(response.bayar);
                    $('.tampil-bayar').text('Rp. ' + response.bayarrp);
                    $('.tampil-terbilang').text(response.terbilang);
                })
                .fail(errors => {
                    alert('Tidak dapat menampilkan data');
                    return;
                })
        }
    </script>
@endsection
