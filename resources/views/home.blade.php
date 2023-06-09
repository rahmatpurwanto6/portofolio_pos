@extends('layouts.template_index')

@section('header', 'Dashboard')

@section('css')
@endsection

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $kategoris }}</h3>
                        <p>Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cube"></i>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $produks }}</h3>
                        <p>Produk</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cubes"></i>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $members }}</h3>
                        <p>Member</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-id-card"></i>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $suppliers }}</h3>
                        <p>Supplier</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-truck"></i>
                    </div>

                </div>
            </div>

        </div>




    </div>
@endsection

@section('js')
@endsection
