@extends('layouts.dashboard')

@section('title')
    {{ $mataKuliah->name ?? 'Show Mata Kuliah' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Mata Kuliah</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.mata-kuliah.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $mataKuliah->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
