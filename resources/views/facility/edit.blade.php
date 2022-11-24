@extends('layouts.dashboard')

@section('title')
    Update Facility
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.facilities.update', $facility->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('facility.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
