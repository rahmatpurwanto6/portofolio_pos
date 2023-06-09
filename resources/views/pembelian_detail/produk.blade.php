<div class="modal fade" id="modal-produk" tabindex="-1" role="dialog" aria-labelledby="modal-produk">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered table-supplier">
                    <thead>
                        <th width="5%">No</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga Beli</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($produk as $key => $item)
                            <tr>
                                <td width="5%" class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center"><span class="badge bg-green">{{ $item->kode_produk }}</span>
                                </td>
                                <td>{{ $item->nama_produk }}</td>
                                <td class="text-center">{{ $item->harga_beli }}</td>
                                <td class="text-center">
                                    <a href="#"
                                        onclick="pilihProduk('{{ $item->id }}', '{{ $item->kode_produk }}')"
                                        class="btn btn-primary btn-xs btn-flat">
                                        <i class="fas fa-check-circle"></i>
                                        Pilih
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
