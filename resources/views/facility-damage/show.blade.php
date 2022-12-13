@extends('layouts.app')

@section('template_title')
    {{ $facilityDamage->name ?? 'Show Facility Damage' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Facility Damage</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('facility-damages.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Bap Id:</strong>
                            {{ $facilityDamage->bap_id }}
                        </div>
                        <div class="form-group">
                            <strong>Facility Id:</strong>
                            {{ $facilityDamage->facility_id }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $facilityDamage->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
