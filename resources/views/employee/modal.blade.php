<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.employees.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Event</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="mb-3">
                            <label class="form-label">Pilih User</label>
                            <select
                                class="form-control form-select-lg {{ $errors->has('user_id') ? ' is-invalid' : '' }}"
                                name="user_id" required>
                                @forelse ($users as $value => $key)
                                    <option value="{{ $key }}">{{ $value }}</option>.
                                @empty
                                    <option disabled selected>== Belum Ada Pegawai ==</option>
                                @endforelse

                            </select>
                        </div>
                        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        <label class="form-label">NIP</label>
                        <input type="number" class="form-control {{ $errors->has('nip') ? ' is-invalid' : '' }}"
                            name="nip" required>
                        {!! $errors->first('nip', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        <label class="form-label">Posisi</label>
                        <input type="text" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}"
                            name="position" required>
                        {!! $errors->first('position', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal"><i
                            class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
