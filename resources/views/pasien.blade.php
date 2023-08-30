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
                                <button type="button" class="btn btn-light-primary text-primary" data-bs-toggle="modal" data-bs-target="#addData">
                                    <i class="ti ti-plus me-1"></i></span>Add New
                                </button>
                            </div>
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
                                                    <button class="btn btn-sm btn-icon btn-light-primary text-primary btn-mini" data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $data->pasienid }}">
                                                        <i class="ti ti-pencil fs-4"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-icon btn-light-danger text-danger btn-mini" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $data->pasienid }}">
                                                        <i class="ti ti-trash fs-4"></i>
                                                    </button>
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

<form action="{{ route('savepasien') }}" method="post">
    @method('POST')
    @csrf
    <div class="modal fade" id="addData" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <h3>Tambah Pasien</h3>
                        <p>Mohon isi form data pasien dengan lengkap.</p>
                    </div>
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="kode">ID</label>
                            <input type="text" disabled id="kode" value="{{ $kodeotomatis }}" name="kode" class="form-control"/>
                            <input type="hidden" name="kodehide" id="kodehide" value="{{ $kodeotomatis }}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="nama">Nama Pasien</label>
                            <input type="text" id="nama" required name="nama" class="form-control" placeholder="John"/>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="notelp">Telepon</label>
                            <input type="text" id="notelp" required name="notelp" class="form-control" placeholder="+62xxx" onkeypress="return onlyNumber(event)"/>
                        </div>
                        <div class="col-12 text-center">
                            <button type="reset" class="btn btn-light-danger text-danger" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            <button type="submit" class="btn btn-light-primary text-primary me-sm-3 me-1">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@foreach ($pasien as $data)
    <form action="{{ route('updatepasien') }}" method="POST">
        @method('PUT')
        @csrf
        <div class="modal fade" id="editModal{{ $data->pasienid }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <div class="text-center mb-4">
                            <h3>Edit Pasien</h3>
                            <p>Mohon isi form data pasien dengan lengkap.</p>
                        </div>
                        <div class="row g-3">
                            <input type="hidden" name="idpasien" id="idpasien" value="{{ $data->pasienid }}">
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="kode">ID</label>
                                <input type="text" disabled id="kode" value="{{ $data->pasienkode }}" name="kode" class="form-control"/>
                                <input type="hidden" name="kodehide" id="kodehide" value="{{ $data->pasienkode }}">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="nama">Nama Pasien</label>
                                <input type="text" id="nama" required name="nama" value="{{ $data->pasiennama }}" class="form-control" placeholder="John"/>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="notelp">Telepon</label>
                                <input type="text" id="notelp" required value="{{ $data->pasientelepon }}" name="notelp" class="form-control" placeholder="+62xxx" onkeypress="return onlyNumber(event)"/>
                            </div>
                            <div class="col-12 text-center">
                                <button type="reset" class="btn btn-light-danger text-danger" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="submit" class="btn btn-light-primary text-primary me-sm-3 me-1">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="{{ route('deletepasien') }}" method="POST">
        @method('DELETE')
        @csrf
        <div class="modal fade" id="deleteModal{{ $data->pasienid }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-simple modal-edit-user">
                <div class="modal-content p-3">
                    <div class="modal-body">
                        <div class="mb-3">
                            <h3>Hapus pasien</h3>
                        </div>
                        <input type="hidden" name="idpasien" required value="{{ $data->pasienid }}" />
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
        $('#table_pasien').DataTable();
    });
</script>

@endsection