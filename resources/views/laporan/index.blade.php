@extends('layouts.template_index')

@section('header', 'Laporan')

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
                            <button onclick="updatePeriode()" class="btn btn-info"><i class="fa fa-plus-circle"></i> Ubah
                                Periode</button>
                            <a href="{{ route('laporan.export_pdf', [$tanggalAwal, $tanggalAkhir]) }}" target="_blank"
                                class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export PDF</a>

                        </div>

                        <div class="card-body table-responsive">

                            <table class="table table-stiped table-bordered">
                                <thead>
                                    <th width="5%" class="text-center">No</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Penjualan</th>
                                    <th class="text-center">Pembelian</th>
                                    <th class="text-center">Pengeluaran</th>
                                    <th class="text-center">Pendapatan</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @includeIf('laporan.form')
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
        let table;

        $(function() {
            table = $('.table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('laporan.data', [$tanggalAwal, $tanggalAkhir]) }}',
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
                        data: 'penjualan',
                        class: 'text-center'
                    },
                    {
                        data: 'pembelian',
                        class: 'text-center'
                    },
                    {
                        data: 'pengeluaran',
                        class: 'text-center'
                    },
                    {
                        data: 'pendapatan',
                        class: 'text-center'
                    }
                ],
                bSort: false,
                bPaginate: false,
            });

            // $('.datepicker').datepicker({
            //     format: 'yyyy-mm-dd',
            //     autoclose: true
            // });
        });

        function updatePeriode() {
            $('#modal-form').modal('show');
        }
    </script>



@endsection
