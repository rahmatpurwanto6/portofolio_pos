@extends('layouts.template_index')

@section('header', 'Transaksi Penjualan')

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

        .table-penjualan tbody tr:last-child {
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

                        </div>

                        <div class="card-body table-responsive">
                            <form class="form-produk" method="post">
                                @csrf
                                <div class="row">
                                    <label for="kode_produk">Kode Produk</label>
                                    <div class="col-md-5">
                                        <div class="input-group mb-3">
                                            <input type="hidden" name="id_penjualan" id="id_penjualan"
                                                value="{{ $id_penjualan }}">
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
                            <table id="example1" class="table table-bordered table-penjualan">
                                <thead>
                                    <th width="5%">No</th>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th width="15%">Jumlah</th>
                                    <th>Diskon</th>
                                    <th>Subtotal</th>
                                    <th width="15%">Aksi</th>
                                </thead>
                            </table>

                            <div class="row mt-3">
                                <div class="col-lg-8">
                                    <div class="tampil-bayar bg-danger"></div>
                                    <div class="tampil-terbilang"></div>
                                </div>
                                <div class="col-lg-4">
                                    <form action="{{ route('transaksi.simpan') }}" method="post" class="form-penjualan">
                                        @csrf
                                        <div class="box-body">
                                            <input type="hidden" name="id_penjualan" value="{{ $id_penjualan }}">
                                            <input type="hidden" name="total" id="total">
                                            <input type="hidden" name="total_item" id="total_item">
                                            <input type="hidden" name="bayar" id="bayar">
                                            <input type="hidden" name="id_member" id="id_member"
                                                value="{{ $memberSelected->id_member }}">


                                            <div class="form-group row">
                                                <label for="totalrp" class="col-lg control-label">Total</label>
                                                <div class="col-lg-8">
                                                    <input type="text" id="totalrp" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="kode_member" class="col-lg control-label">Member</label>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="kode_member"
                                                            value="{{ $memberSelected->kode_member }}">
                                                        <span class="input-group-btn">
                                                            <button onclick="tampilMember()" class="btn btn-info btn-flat"
                                                                type="button"><i class="fa fa-arrow-right"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="diskon" class="col-lg control-label">Diskon</label>
                                                <div class="col-lg-8">
                                                    <input type="number" name="diskon" id="diskon" class="form-control"
                                                        value="{{ !empty($memberSelected->id_member) ? $diskon : 0 }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="bayar" class="col-lg control-label">Bayar</label>
                                                <div class="col-lg-8">
                                                    <input type="text" id="bayarrp" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="diterima" class="col-lg control-label">Diterima</label>
                                                <div class="col-lg-8">
                                                    <input type="number" id="diterima" class="form-control"
                                                        name="diterima" value="{{ $penjualan->diterima ?? 0 }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="kembali" class="col-lg control-label">Kembali</label>
                                                <div class="col-lg-8">
                                                    <input type="text" id="kembali" name="kembali"
                                                        class="form-control" value="0" readonly>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary btn-sm btn-flat btn-simpan"
                                                style="float: right;"><i class="fas fa-save"></i> Simpan
                                                Transaksi</button>
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

    @includeIf('penjualan_detail.produk')
    @includeIf('penjualan_detail.member')
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
        function debounce(func, wait) {
            let timeout;
            return function(...args) {
                const context = this;
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(context, args), wait);
            };
        }

        let table, table2;

        $(function() {


            table = $('.table-penjualan').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('transaksi.data', $id_penjualan) }}',
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
                        data: 'harga_jual',
                        class: 'text-center'
                    },
                    {
                        data: 'jumlah',
                        class: 'text-center'
                    },
                    {
                        data: 'diskon',
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

                setTimeout(() => {
                    $('#diterima').trigger('input');
                }, 300);


            });

            $('.table-member').DataTable();

            $(document).on('input', '.jumlah', debounce(function() {
                let id = $(this).data('id');
                let jumlah = parseInt($(this).val());

                if (isNaN(jumlah) || jumlah <= 0) {
                    alert('Jumlah harus berupa angka positif');
                    return;
                }

                // Tampilkan indikator loading
                let loadingIndicator = $('<span class="loading-indicator">Loading...</span>');
                $(this).after(loadingIndicator);

                $.post(`{{ url('/transaksi') }}/${id}`, {
                        '_token': '{{ csrf_token() }}',
                        '_method': 'put',
                        'jumlah': jumlah
                    })
                    .done(response => {
                        // Reload seluruh tabel untuk memastikan data diperbarui
                        table.ajax.reload(() => loadForm($('#diskon').val()));
                    })
                    .fail(errors => {
                        alert('Tidak dapat menyimpan data');
                    })
                    .always(() => {
                        loadingIndicator.remove();
                    });
            }, 300)); // Debounce selama 300ms

            $(document).on('input', '#diskon', function() {
                if ($(this).val() == "") {
                    $(this).val(0).select();
                }

                loadForm($(this).val());
            });

            $('#diterima').on('input', function() {
                if ($(this).val() == "") {
                    $(this).val(0).select();
                }

                loadForm($('#diskon').val(), $(this).val());
            }).focus(function() {
                $(this).select();
            });

            $('.btn-simpan').on('click', function() {
                $('.form-penjualan').submit();
            });

            // setInterval(() => {
            //     table.ajax.reload(() => loadForm($('#diskon').val()));
            // }, 2000);

        });

        let isModalMemberVisible = false;

        function tampilMember() {
            if (isModalMemberVisible) {
                console.log('tampilMember called but modal is already visible');
                return;
            }
            console.log('Opening modal-member');
            isModalMemberVisible = true;
            $('#modal-member').modal('show');
        }

        function pilihMember(id, kode) {
            console.log('pilihMember called with id:', id, 'kode:', kode);
            $('#id_member').val(id);
            $('#kode_member').val(kode);
            $('#diskon').val('{{ $diskon }}');
            loadForm($('#diskon').val());
            $('#diterima').val(0).focus().select();
            console.log('Calling hideMember from pilihMember');
            hideMember();
        }

        function hideMember() {
            if (!isModalMemberVisible) {
                console.log('hideMember called but modal is already hidden');
                return;
            }
            console.log('Closing modal-member');
            isModalMemberVisible = false;
            $('#modal-member').modal('hide');
        }

        let isModalProdukVisible = false;

        function tampilProduk() {
            if (isModalProdukVisible) return;
            console.log('Opening modal-produk');
            isModalProdukVisible = true;
            $('#modal-produk').modal('show');
        }

        function hideProduk() {
            if (!isModalProdukVisible) return;
            console.log('Closing modal-produk');
            isModalProdukVisible = false;
            $('#modal-produk').modal('hide');
        }

        function pilihProduk(id, kode) {
            $('#produk_id').val(id);
            $('#kode_produk').val(kode);
            hideProduk();
            tambahProduk();
        }

        function tambahProduk() {
            $.post('{{ route('transaksi.store') }}', $('.form-produk').serialize())
                .done(response => {
                    $('#kode_produk').focus();
                    table.ajax.reload(() => loadForm($('diskon').val()));
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
                        // table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menghapus data');
                        return;
                    });
            }
        }

        function loadForm(diskon = 0, diterima = 0) {
            $('#total').val($('.total').text());
            $('#total_item').val($('.total_item').text());

            $.get(`{{ url('/transaksi/loadform') }}/${diskon}/${$('.total').text()}/${diterima}`)
                .done(response => {
                    $('#totalrp').val('Rp. ' + response.totalrp);
                    $('#bayarrp').val('Rp. ' + response.bayarrp);
                    $('#bayar').val(response.bayar);
                    $('.tampil-bayar').text('Bayar: Rp. ' + response.bayarrp);
                    $('.tampil-terbilang').text(response.terbilang);

                    $('#kembali').val('Rp.' + response.kembalirp);
                    if ($('#diterima').val() != 0) {
                        $('.tampil-bayar').text('Kembali: Rp. ' + response.kembalirp);
                        $('.tampil-terbilang').text(response.kembali_terbilang);
                    }
                })
                .fail(errors => {
                    alert('Tidak dapat menampilkan data');
                    return;
                })
        }

        $(document).on('hidden.bs.modal', '#modal-member', function () {
            console.log('Modal-member hidden event triggered');
            isModalMemberVisible = false;
        });
    </script>
@endsection
