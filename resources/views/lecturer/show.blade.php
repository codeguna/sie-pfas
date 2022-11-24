@extends('layouts.app')

@section('template_title')
    {{ $lecturer->name ?? 'Show Lecturer' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Lecturer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('lecturers.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $lecturer->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nip:</strong>
                            {{ $lecturer->nip }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $lecturer->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
