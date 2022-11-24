<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <div class="mb-3">
                <label class="form-label">Pilih User</label>
                <select class="form-control form-select-lg {{ $errors->has('user_id') ? ' is-invalid' : '' }}"
                    name="user_id" required>
                    <option value="{{ $employee->user_id }}" selected>{{ $employee->user->name }}</option>
                    @foreach ($users as $value => $key)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach

                </select>
            </div>
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label class="form-label">NIP</label>
            <input type="number" class="form-control {{ $errors->has('nip') ? ' is-invalid' : '' }}" name="nip"
                value="{{ $employee->nip }}" required>
            {!! $errors->first('nip', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label class="form-label">Posisi</label>
            <input type="text" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}"
                name="position" value="{{ $employee->position }}" required>
            {!! $errors->first('position', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
