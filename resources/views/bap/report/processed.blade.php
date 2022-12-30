@extends('layouts.dashboard')
@section('title')
    Report Fasilitas Tertangani
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-lg-12 -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Tertangani vs Belum Tertangani</h3>
                        <p><em>dalam {{ $periode }} hari terakhir</em></p>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $bapDone }}</h3>

                                        <p>Tertangani</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ $bapUnDone }}</h3>

                                        <p>Belum Tertangani</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $bapTotal }}</h3>

                                        <p>Total data BAP</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-info" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
