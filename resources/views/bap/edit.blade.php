@extends('layouts.dashboard')

@section('title')
    Update Bap
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Bap</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.baps.update', $bap->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('bap.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
