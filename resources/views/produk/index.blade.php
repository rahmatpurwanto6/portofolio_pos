@extends('layouts.template_index')

@section('header', 'Produk')

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
                            <a type="button" class="btn btn-primary mb-2" @click="addData()"><i class="fas fa-plus"></i>
                                Tambah</a>
                            @if (session()->has('message'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>

                        <div class="card-body table-responsive">

                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px" class="text-center">No.</th>
                                        <th class="text-center">Kode Produk</th>
                                        <th class="text-center">Nama Kategori</th>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Merk</th>
                                        <th class="text-center">Harga Beli</th>
                                        <th class="text-center">Diskon</th>
                                        <th class="text-center">Harga Jual</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Aksi</th>
                                        <th class="text-center"><button type="button" name="bulk_delete" id="bulk_delete"
                                                class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i>
                                                Delete</button></th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form :action="url" method="post" class="form-modal" @submit="submitForm($event, data.id)">
                        <div class="modal-header">
                            <h4 class="modal-title">Produk</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf

                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <select name="kategori_id" class="form-control" :value="data.kategori_id">
                                    <option value=""></option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" name="nama_produk" :value="data.nama_produk"
                                    class="form-control @error('nama_produk') is-invalid @enderror" required>
                                @error('nama_produk')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" name="merk" :value="data.merk"
                                    class="form-control @error('merk') is-invalid @enderror" required>
                                @error('merk')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Harga Beli</label>
                                <input type="text" name="harga_beli" :value="data.harga_beli"
                                    class="form-control @error('harga_beli') is-invalid @enderror" required>
                                @error('harga_beli')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input type="text" name="harga_jual" :value="data.harga_jual"
                                    class="form-control @error('harga_jual') is-invalid @enderror" required>
                                @error('harga_jual')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Diskon</label>
                                <input type="number" name="diskon" :value="data.diskon"
                                    class="form-control @error('diskon') is-invalid @enderror" required>
                                @error('diskon')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="number" name="stok" :value="data.stok"
                                    class="form-control @error('stok') is-invalid @enderror" required>
                                @error('stok')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
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
        var url = '{{ url('produk') }}';
        var apiUrl = '{{ url('api/produk') }}';

        var columns = [{
                data: 'DT_RowIndex',
                class: 'text-center',
                width: '30px',
                orderable: false
            },
            {
                data: 'kode_produk',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'nama_kategori',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'nama_produk',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'merk',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'harga_beli',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'diskon',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'harga_jual',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'stok',
                class: 'text-center',
                orderable: false
            },
            {
                render: function(index, row, data, meta) {
                    return `
                <a class="btn btn-primary btn-sm" onclick="controller.editData(event, ${meta.row})"><i class="fa fa-edit"></i> </a>
                <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})"><i class="fa fa-trash"></i> </a>
            `
                },
                orderable: false,
                width: '100px',
                class: 'text-center'
            },
            {
                data: 'checkbox',
                class: 'text-center',
                orderable: false,
                searchable: false
            }
        ];
    </script>

    <script>
        var controller = new Vue({
            el: '#controller',
            data: {
                datas: [], //untuk menampung data dari controller
                data: {}, //untuk crud
                url,
                apiUrl,
                editStatus: false,
            },
            mounted: function() {
                this.datatable();
            },
            methods: {
                datatable() {
                    const _this = this;
                    _this.table = $('#example1').DataTable({
                        ajax: {
                            url: _this.apiUrl,
                            type: 'GET'
                        },
                        columns: columns
                    }).on('xhr', function() {
                        _this.datas = _this.table.ajax.json().data;
                    });
                },
                addData() {
                    this.data = {};
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(event, row, data) {
                    this.data = this.datas[row];
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(event, id) {
                    if (confirm('Are you sure delete this data?')) {
                        $(event.target).parents('tr').remove();
                        axios.post(this.url + '/' + id, {
                            _method: 'DELETE'
                        }).then(response => {
                            // alert('Data succesfully delete');
                            Swal.fire({
                                title: 'Success',
                                text: 'Data successfully delete!',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000
                            });
                            this.table.ajax.reload();
                        });
                    }
                },
                submitForm(event, id) {
                    event.preventDefault();
                    const _this = this;
                    var url = !this.editStatus ? this.url : this.url + '/' + id;
                    axios.post(url, new FormData($(event.target)[0])).then(response => {
                        $('#modal-default').modal('hide');
                        _this.table.ajax.reload();

                        if (this.editStatus == false) {
                            Swal.fire({
                                title: 'Success',
                                text: 'Data successfully submitted!',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        } else {
                            Swal.fire({
                                title: 'Success',
                                text: 'Data successfully update!',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    })
                },
            }
        });
    </script>

    <script>
        $(function() {
            $('#example1').DataTable()
        });

        $(document).on('click', '#bulk_delete', function() {
            var id = [];
            if (confirm('Are you sure to delete data?')) {
                $('.produk_checkbox:checked').each(function() {
                    id.push($(this).val());
                });
                if (id.length > 0) {
                    $.ajax({
                        url: '{{ route('produk.select_delete') }}',
                        method: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id: id
                        },
                        success: function(data) {
                            Swal.fire({
                                title: 'Success',
                                text: 'Data successfully delete!',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000
                            });
                            window.location.reload();
                        }
                    });
                } else {
                    alert('Mohon pilih minimal 1 data');
                }
            }
        });
    </script>

@endsection
