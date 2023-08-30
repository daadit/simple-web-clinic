@extends('layouts.app')

@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        @if (session('success-message'))
            <div class="alert alert-primary alert-dismissible border-0 fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success!</strong> {{ session('success-message') }}
            </div>
        @endif
        <section>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('savetransaksi') }}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-5 col-md-12">
                                        <div>
                                            <label>No. Faktur</label>
                                            <div class="form-group mt-2">
                                                <input type="text" disabled value="{{ $kodeotomatis }}" name="invoice" class="form-control invoice" placeholder="No. Invoice">
                                                <input type="hidden" name="invoicehide" id="invoicehide" value="{{ $kodeotomatis }}">
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <label>Tanggal</label>
                                            <div class="form-group mt-2">
                                                <input type="date" value="{{ $datenow }}" name="tanggal" class="form-control tanggal" placeholder="Tanggal Masuk" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-12">
                                        <div>
                                            <label>ID Pasien</label>
                                            <div class="input-group mt-2">
                                                <input type="hidden" name="idpasienhide" id="idpasienhide">
                                                <input type="text" id="idpasien" disabled required name="idpasien" class="form-control idpasien"/>
                                                <button class="btn btn-light-info text-info font-medium" data-bs-toggle="modal" data-bs-target="#modalPasien" type="button">
                                                    <i class="ti ti-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <label>Nama Pasien</label>
                                            <div class="form-group mt-2">
                                                <input type="text" disabled name="namapasien" class="form-control namapasien" id="namapasien" placeholder="-" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label>Kode Barang</label>
                                        <div class="input-group mt-2">
                                            <input type="hidden" name="idbaranghide" id="idbaranghide">
                                            <input type="hidden" name="kodebaranghide" id="kodebaranghide">
                                            <input type="text" name="kodebarang" id="kodebarang" class="form-control kodebarang" disabled placeholder="-">
                                            <button class="btn btn-light-info text-info font-medium" data-bs-toggle="modal" data-bs-target="#modalBarang" type="button">
                                                <i class="ti ti-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Harga</label>
                                        <div class="input-group mt-2">
                                            <button class="btn btn-light-info text-info font-medium" type="button">
                                                Rp.
                                            </button>
                                            <input type="hidden" name="hargabaranghide" id="hargabaranghide">
                                            <input type="text" disabled name="hargabarang" id="hargabarang" class="form-control hargabarang" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label>Qty</label>
                                        <div class="form-group mt-2">
                                            <input type="text" name="qty" class="form-control qty" id="qty">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <button onclick="saveDataDetail()" type="button" class="btn btn-light-primary" style="margin-top: 30px">
                                            <i class="ti ti-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table class="table border table-bordered text-nowrap table-sm" id="table_transaksi">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">No</th>
                                                <th>Item yang dibeli</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>SubTotal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tabelajax" id="tabelajax"></tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="row justify-content-end">
                                    <div class="col-lg-3">
                                        <label for="">Total Item :</label>
                                        <input type="hidden" name="totalitemhide" id="totalitemhide">
                                        <input type="text" id="totalitem" name="totalitem" disabled class="form-control totalitem mt-2"></input>
                                    </div>
                                </div>
                                <div class="row justify-content-end mt-2">
                                    <div class="col-lg-3">
                                        <label for="">Total Bayar :</label>
                                        <input type="hidden" name="totalbayarhide" id="totalbayarhide">
                                        <input type="text" id="totalbayar" name="totalbayar" disabled class="form-control totalbayar mt-2"></input>
                                    </div>
                                </div>
                                <br>
                                <div class="row justify-content-end">
                                    <div class="col-lg-3">
                                        <div class="text-end">
                                            <button type="button" onclick="window.location='{{ route('transaksi') }}'" class="btn btn-light-danger text-danger">
                                                Kembali
                                            </button>
                                            <button type="button" onclick="simpanTransaksi()" id="button-submit" class="btn btn-light-primary text-primary">Submit</button>
                                            <button type="submit" id="trigger-submit" class="btn d-none">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="modal fade" id="modalPasien" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3">
            <div class="modal-body">
                <div class="text-center mb-4">
                    <h3>Data Pasien</h3>
                </div>
                <div class="row g-2">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table border table-bordered text-nowrap table-sm" id="table_pasien">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th>ID</th>
                                        <th>Nama Pasien</th>
                                        <th>Telepon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pasien as $number => $data)
                                        <tr>
                                            <td style="width: 7%; text-align: center">{{ ++$number }}</td>
                                            <td>{{ $data->pasienkode }}</td>
                                            <td>{{ $data->pasiennama }}</td>
                                            <td>{{ $data->pasientelepon }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-icon btn-light-primary text-primary btn-mini btn-pilihpasien" data-id="{{ $data->pasienid }}" data-kode="{{ $data->pasienkode }}" data-nama="{{ $data->pasiennama }}">
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
</div>

<div class="modal fade" id="modalBarang" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user" id="modalAddBarang">
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
</div>

<script>
    let totalharga = 0;
    let qty = 0;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    function showCount() {
        let invoice = $('.invoice').val();

        $.ajax({
            type: "POST",
            url: "/transaksi/detail-count",
            data: {
                invoice: invoice
            },
            success: function (response) {
                totalharga = parseFloat(response.totalHarga)
                qty = parseFloat(response.totalItem)
                $('#totalitemhide').val(qty);
                $('#totalitem').val(qty);
                $('#totalbayarhide').val(response.totalHarga);

                var number_string = totalharga.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
            
                $('#totalbayar').val('Rp. ' + rupiah);
            },
            error: function (xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }

    function showDataDetail() {
        let invoice = $('.invoice').val();

        $.ajax({
            type: "POST",
            url: "/transaksi/detail-show",
            data: {
                invoice: invoice
            },
            beforeSend: function(f) {
                $('#tabelajax').html(`<div class="text-center">
                Loading...
                </div>`);
            },
            success: function (response) {
                $('#tabelajax').html(response);
                showCount();
            },
            error: function (xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }

    function showDataDetailBarang() {
        let invoice = $('.invoice').val();

        $.ajax({
            type: "GET",
            url: "/transaksi/detail-barang" + "/" + invoice,
            success: function (response) {
                $('#modalAddBarang').html(response);
            },
            error: function (xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }

    function saveDataDetail() {
        let invoice = $('#invoicehide').val()
        let idbaranghide = $('#idbaranghide').val()
        let hargabaranghide = $('#hargabaranghide').val()
        let qty = $('#qty').val()
        let jumlah = qty * hargabaranghide
        
        if (idbaranghide.length == 0) {
            alert('Kode Barang tidak boleh kosong')
        } else if (qty.length == 0) {
            alert('QTY tidak boleh kosong')
        } else if (qty == 0) {
            alert('QTY tidak boleh kurang dari 1')
        } else {
            $.ajax({
                url: "/transaksi/detail-save",
                type: "POST",
                data: {
                    invoice: invoice,
                    idbaranghide: idbaranghide,
                    qty: qty,
                    jumlah: jumlah,
                },
                success: function(data) {
                    showDataDetail();
                    showDataDetailBarang();
                    $('#idbaranghide').val('');
                    $('#kodebaranghide').val('');
                    $('#kodebarang').val('');
                    $('#hargabaranghide').val('');
                    $('#hargabarang').val('');
                    $('.qty').val('');
                },
                error: function (xhr, ajaxOption, thrownError) {
                    alert(xhr.status + '\n' + thrownError)
                }
            });
        }
    }

    function simpanTransaksi() {
        const invoicehide = $('#invoicehide').val();
        const tanggal = $('#tanggal').val();
        const idpasienhide = $('#idpasienhide').val();

        if (qty > 0) {
            if (idpasienhide) {
                $("#trigger-submit").trigger("click");
            } else {
                alert('Pasien tidak boleh kosong!')
            }
        } else {
            alert('Item tidak boleh kosong!');
        }
    }

    function deleteDataDetail(id) {
        $.ajax({
            url: "/transaksi/detail-delete",
            type: "POST",
            data: {
                id: id
            },
            success: function(data) {
                showDataDetail();
                showDataDetailBarang();
                $('#idbaranghide').val('');
                $('#kodebaranghide').val('');
                $('#kodebarang').val('');
                $('#hargabaranghide').val('');
                $('#hargabarang').val('');
                $('.qty').val('');
            },
            error: function (xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }

    function onlyNumber(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }

    $(document).ready(function() {
        $('#table_transaksi').DataTable();
        $('#table_pasien').DataTable();
        $('#table_barang').DataTable();
        showDataDetail();
    });

    $('.btn-pilihpasien').on('click', function() {
        const kode = $(this).data('kode');
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        $('#idpasienhide').val(id);
        $('#idpasien').val(kode);
        $('#namapasien').val(nama);
        $('#modalPasien').modal('hide');
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

@endsection