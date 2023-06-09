@extends('layouts.template_index')

@section('header', 'Pembelian')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
@endsection

@section('content')
    <div id="controller">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <button onclick="addForm()" class="btn btn-primary"><i class="fas fa-plus"></i>
                                Transaksi Baru</button>
                            @empty(!session('id_pembelian'))
                                <a href="{{ route('pembelian_detail.index') }}" class="btn btn-info"><i
                                        class="fas fa-pencil-alt"></i> Transaksi Aktif</a>
                            @endempty
                        </div>

                        <div class="card-body table-responsive">

                            <table id="example1" class="table table-bordered table-pembelian">
                                <thead>
                                    <tr>
                                        <th style="width: 10px" class="text-center">No.</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Supplier</th>
                                        <th class="text-center">Total Item</th>
                                        <th class="text-center">Total Harga</th>
                                        <th class="text-center">Diskon</th>
                                        <th class="text-center">Total Bayar</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    @includeIf('pembelian.supplier')
    @includeIf('pembelian.detail')

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
        let table, table1;

        $(function() {
            table = $('.table-pembelian').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('pembelian.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false,
                        class: 'text-center'
                    },
                    {
                        data: 'tanggal',
                        class: 'text-center'
                    },
                    {
                        data: 'supplier',
                        class: 'text-center'
                    },
                    {
                        data: 'total_item',
                        class: 'text-center'
                    },
                    {
                        data: 'total_harga',
                        class: 'text-center'
                    },
                    {
                        data: 'diskon',
                        class: 'text-center'
                    },
                    {
                        data: 'bayar',
                        class: 'text-center'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false,
                        class: 'text-center'
                    },
                ]
            });

            $('.table-supplier').DataTable();
            table1 = $('.table-detail').DataTable({
                processing: true,
                bSort: false,
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
                ]
            })

        });

        function addForm() {
            $('#modal-supplier').modal('show');
        }

        function detail(url) {
            $('#modal-detail').modal('show');

            table1.ajax.url(url);
            table1.ajax.reload();
        }

        function deleteData(url) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                $.post(url, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'delete'
                    })
                    .done((response) => {
                        Swal.fire({
                            title: 'Success',
                            text: 'Data successfully delete!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menghapus data');
                        return;
                    });
            }
        }
    </script>
@endsection
