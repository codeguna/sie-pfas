@extends('layouts.dashboard')

@section('template_title')
    {{ $bap->name ?? 'Show Bap' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Bap</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.baps.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $bap->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Employee Id:</strong>
                            {{ $bap->employee_id }}
                        </div>
                        <div class="form-group">
                            <strong>Ticket Code:</strong>
                            {{ $bap->ticket_code }}
                        </div>
                        <div class="form-group">
                            <strong>Room Id:</strong>
                            {{ $bap->room_id }}
                        </div>
                        <div class="form-group">
                            <strong>Mata Kuliah:</strong>
                            {{ $bap->mata_kuliah }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $bap->description }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $bap->status }}
                        </div>
                        <div class="form-group">
                            <strong>Fixed Date:</strong>
                            {{ $bap->fixed_date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
