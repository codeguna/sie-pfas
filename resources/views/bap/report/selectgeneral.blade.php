@extends('layouts.dashboard')
@section('title')
    Pilih Periode Kerusakan Ruangan
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-lg-12 -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <form action="{{ route('admin.baps.reportgeneral') }}" method="GET">
                                <select class="form-control" name="periode" required>
                                    <option value="30">30 hari</option>
                                    <option value="90">90 hari</option>
                                    <option value="120">120 hari</option>
                                    <option value="365">365 hari</option>
                                </select>
                        </div>
                        <button class="btn btn-primary w-100" type="submit"><i class="fa fa-check" aria-hidden="true"></i>
                            Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
