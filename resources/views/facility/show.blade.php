@extends('layouts.dashboard')

@section('title')
    {{ $facility->name ?? 'Show Facility' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Facility</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.facilities.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $facility->name }}
                        </div>
                        <div class="form-group">
                            <strong>Location:</strong>
                            {{ $facility->location }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
