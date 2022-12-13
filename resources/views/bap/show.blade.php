@extends('layouts.dashboard')

@section('title')
    Detail Laporan
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">R. {{ $bap->room->name }} - {{ $bap->matakuliah->name }}</h4>
                        <p class="text-sm text-center">
                            <i class="fa fa-calendar"></i>
                            {{ $bap->created_at }}
                        </p>
                        <p class="text-center">Dosen pengajar: {{ $bap->user->name }}</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @php
                                $index = 0;
                            @endphp
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nama Faslitas</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($facility_damage as $facility)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $facility->facility->name }}</td>
                                            <td>{{ $facility->description }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('admin.baps.setdonebap', $id) }}" method="POST">
                                    @csrf
                                    <div class="form-check form-check-inline">
                                        <label>Tanggal Perbaikan</label>
                                        <input type="date" class="form-control" name="fixed_date" required>
                                        <input type="hidden" name="status" value="1">
                                    </div>

                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Selesaikan Perkejaan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
