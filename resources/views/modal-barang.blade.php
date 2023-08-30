<div class="modal-dialog modal-lg modal-simple modal-edit-user">
    <div class="modal-content p-3">
        <div class="modal-body">
            <div class="text-center mb-4">
                <h3>Data Barang</h3>
            </div>
            <div class="row g-2">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table border table-bordered text-nowrap table-sm" id="table_barang">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $number => $data)
                                    <tr>
                                        <td style="width: 7%; text-align: center">{{ ++$number }}</td>
                                        <td>{{ $data->barangnama }}</td>
                                        <td>@currency($data->barangharga)</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-icon btn-light-primary text-primary btn-mini btn-pilihbarang" data-id="{{ $data->barangid }}" data-nama="{{ $data->barangnama }}" data-harga="{{ $data->barangharga }}">
                                                <i class="ti ti-arrow-left fs-4"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button type="reset" class="btn btn-light-danger text-danger" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#table_barang').DataTable();
    });

    $('.btn-pilihbarang').on('click', function() {
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        const harga = $(this).data('harga');
        $('#idbaranghide').val(id);
        $('#kodebaranghide').val(nama);
        $('#kodebarang').val(nama);
        $('#hargabaranghide').val(harga);
        $('#qty').val(1);

        var number_string = harga.toString(),
            sisa = number_string.length % 3,
            rupiah = number_string.substr(0, sisa),
            ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        $('#hargabarang').val('Rp. ' + rupiah);

        $('#modalBarang').modal('hide');
    });
</script>