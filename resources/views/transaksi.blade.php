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
                        <div class="card-body">
                            <div class="pb-2 text-end">
                                <a type="button" class="btn btn-light-primary text-primary" href="{{ route('addtransaksi') }}">
                                    <i class="ti ti-plus me-1"></i></span>Add New
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table border table-bordered text-nowrap table-sm" id="table_transaksi">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th>Invoice</th>
                                            <th>Tanggal</th>
                                            <th>Pasien</th>
                                            <th>Total Barang</th>
                                            <th>Total Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi as $number => $data)
                                            <tr>
                                                <td style="width: 7%; text-align: center">{{ ++$number }}</td>
                                                <td>{{ $data->tnoinvoice }}</td>
                                                <td>{{ $data->ttanggal }}</td>
                                                <td>{{ $data->pasiennama }}</td>
                                                <td>{{ $data->ttotalitem }}</td>
                                                <td>@currency($data->ttotalharga)</td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-icon btn-light-danger text-danger btn-mini" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $data->tid }}">
                                                        <i class="ti ti-trash fs-4"></i>
                                                    </button>
                                                    <a href="/transaksi/faktur/{{ $data->tnoinvoice }}" target="_blank" class="btn btn-sm btn-icon btn-light-success text-success btn-mini">
                                                        <i class="ti ti-file fs-4"></i>
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
            </div>
        </section>
    </div>
</div>

@foreach ($transaksi as $data)
    <form action="{{ route('deletetransaksi') }}" method="POST">
        @method('DELETE')
        @csrf
        <div class="modal fade" id="deleteModal{{ $data->tid }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-simple modal-edit-user">
                <div class="modal-content p-3">
                    <div class="modal-body">
                        <div class="mb-3">
                            <h3>Hapus Transaksi</h3>
                        </div>
                        <input type="hidden" name="idtransaksi" required value="{{ $data->tid }}" />
                        <h6>Are you sure you delete this data?</h6>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-light-danger text-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-light-primary text-primary me-sm-3 me-1">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach

<script>
    function onlyNumber(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
    $(document).ready(function() {
        $('#table_transaksi').DataTable();
    });
</script>

@endsection