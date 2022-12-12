@extends('layouts.dashboard')

@section('template_title')
    Create Room
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Room</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.rooms.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('room.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
