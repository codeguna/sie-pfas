@extends('layouts.dashboard')

@section('template_title')
    Update Mata Kuliah
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Mata Kuliah</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.mata-kuliah.update', $mataKuliah->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('mata-kuliah.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
