@extends('layouts.dashboard')

@section('title')
    Rekap Data BAP
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

                            <div class="float-right">
                                <a href="{{ route('admin.baps.create') }}" class="btn btn-success btn-sm float-right"
                                    data-placement="left">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </a>
                            </div>
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
                                            <form action="{{ route('admin.baps.destroy', $bap->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                    href="{{ route('admin.baps.show', $bap->id) }}"
                                                    title="Detail Kerusakan"><i class="fa fa-fw fa-eye"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-light btn-sm"><i
                                                        class="fa fa-fw fa-trash"></i></button>
                                            </form>
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
                                                        <span class="badge bg-info">{{ $bap->employee_id }}</span>
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
                                                        <span class="badge bg-primary">Sudah diperbaiki pada tanggal
                                                            {{ $bap->fixed_date }}</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Assign Petugas</label>
                                                <select class="form-control" name="" id="">
                                                    <option selected disabled>== Pilih Petugas ==</option>
                                                    @foreach ($users as $value => $key)
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Tanggal Perbaikan</label>
                                                <input class="form-control" type="date" name="fixed_date">
                                            </div>
                                        </div>
                                    </div>
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
