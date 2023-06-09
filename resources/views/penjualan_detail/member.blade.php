<div class="modal fade" id="modal-member" tabindex="-1" role="dialog" aria-labelledby="modal-member">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered table-member">
                    <thead>
                        <th width="5%" class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Telepon</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($member as $key => $item)
                            <tr>
                                <td width="5%" class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td class="text-center">{{ $item->telepon }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-primary btn-xs btn-flat"
                                        onclick="pilihMember('{{ $item->id }}', '{{ $item->kode_member }}')">
                                        <i class="fa fa-check-circle"></i>
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
