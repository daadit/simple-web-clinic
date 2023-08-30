@extends('layouts.app')

@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <div class="item">
                    <div class="card border-0 zoom-in bg-light-primary shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-user-male.svg" width="50" height="50" class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-primary mb-1"> Pasien </p>
                        <h5 class="fw-semibold text-primary mb-0">{{ $pasien }}</h5>
                        </div>
                    </div>
                    </div>
                </div>                
            </div>
            <div class="col-3">
                <div class="item">
                    <div class="card border-0 zoom-in bg-light-warning shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-briefcase.svg" width="50" height="50" class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-warning mb-1">Barang</p>
                        <h5 class="fw-semibold text-warning mb-0">{{ $barang }}</h5>
                        </div>
                    </div>
                    </div>
                </div>               
            </div>
        </div>
    </div>
</div>

@endsection