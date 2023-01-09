@extends('layouts.dashboard')
@section('title')
    Selamat Datang,
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">di Sistem Informasi Eksekutif - BAP</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Ada yang bisa kami bantu?</h6>

                        <p class="card-text">Untuk memulai pelaporan BAP, silahkan klik tombol dibawah ini atau melalui menu
                            disamping</p>
                        @hasrole('dosen')
                            <a href="{{ url('/admin/baps/create') }}" class="btn btn-primary"> <i class="fa fa-paper-plane"
                                    aria-hidden="true"></i> Lapor
                                Sekarang</a>
                        @endhasrole
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('scripts')
    @parent
@endsection
