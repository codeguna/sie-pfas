<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('bap_id') }}
            {{ Form::text('bap_id', $facilityDamage->bap_id, ['class' => 'form-control' . ($errors->has('bap_id') ? ' is-invalid' : ''), 'placeholder' => 'Bap Id']) }}
            {!! $errors->first('bap_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('facility_id') }}
            {{ Form::text('facility_id', $facilityDamage->facility_id, ['class' => 'form-control' . ($errors->has('facility_id') ? ' is-invalid' : ''), 'placeholder' => 'Facility Id']) }}
            {!! $errors->first('facility_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $facilityDamage->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>