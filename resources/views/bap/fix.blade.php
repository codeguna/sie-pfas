@extends('layouts.dashboard')

@section('title')
    Daftar BAP
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                </div>
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="row">
                            @foreach ($baps as $bap)
                                <div class="col-md-4">
                                    @if ($bap->status == 0)
                                        <div class="card card-danger">
                                        @else
                                            <div class="card card-success">
                                    @endif
                                    <div class="card-header">
                                        <h3 class="card-title">{{ ++$i }}. R. {{ $bap->room->name }} -
                                            {{ $bap->matakuliah->name }}
                                        </h3>
                                        <br />
                                        <p class="text-xs">
                                            <i class="fa fa-calendar" aria-hidden="true"></i> {{ $bap->created_at }}
                                        </p>

                                        <div class="card-tools">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('admin.baps.show', $bap->id) }}" title="Detail Kerusakan"><i
                                                    class="fa fa-fw fa-eye"></i></a>
                                        </div>
                                        <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>Kode Tiket:</strong>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $bap->ticket_code }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Nama Dosen:</strong>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $bap->user->name }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Status BAP:</strong>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    @if ($bap->status == 0)
                                                        <span class="badge bg-danger">Belum Diperbaiki</span>
                                                    @else
                                                        <span class="badge bg-success">Sudah Diperbaiki</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Petugas Pelaksana:</strong>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    @if ($bap->employee_id == null)
                                                        <span class="badge bg-secondary">Petugas belum ada</span>
                                                    @else
                                                        <span class="badge bg-info">{{ $bap->userEmployee->name }}</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Tanggal Perbaikan:</strong>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    @if ($bap->fixed_date == null)
                                                        <span class="badge bg-warning">Tanggal Perbaikan <br />Belum
                                                            Ditentukan</span>
                                                    @else
                                                        <span class="badge bg-primary">Sudah diperbaiki <br />pada tanggal
                                                            <br />{{ $bap->fixed_date }}</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {!! $baps->links() !!}
        </div>
    </div>
    </div>
@endsection
