{{-- <div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $bap->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('employee_id') }}
            {{ Form::text('employee_id', $bap->employee_id, ['class' => 'form-control' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Employee Id']) }}
            {!! $errors->first('employee_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ticket_code') }}
            {{ Form::text('ticket_code', $bap->ticket_code, ['class' => 'form-control' . ($errors->has('ticket_code') ? ' is-invalid' : ''), 'placeholder' => 'Ticket Code']) }}
            {!! $errors->first('ticket_code', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('room_id') }}
            {{ Form::text('room_id', $bap->room_id, ['class' => 'form-control' . ($errors->has('room_id') ? ' is-invalid' : ''), 'placeholder' => 'Room Id']) }}
            {!! $errors->first('room_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('mata_kuliah') }}
            {{ Form::text('mata_kuliah', $bap->mata_kuliah, ['class' => 'form-control' . ($errors->has('mata_kuliah') ? ' is-invalid' : ''), 'placeholder' => 'Mata Kuliah']) }}
            {!! $errors->first('mata_kuliah', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $bap->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $bap->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fixed_date') }}
            {{ Form::text('fixed_date', $bap->fixed_date, ['class' => 'form-control' . ($errors->has('fixed_date') ? ' is-invalid' : ''), 'placeholder' => 'Fixed Date']) }}
            {!! $errors->first('fixed_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div> --}}

<div class="row">
    @php
        $timestamp = now();
        $ticket_code = time();
    @endphp
    <div class="col-md-12">
        <label>Kode Ticket</label>
        <input type="text" class="form-control" name="ticket_code" value="{{ $ticket_code }}" readonly>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Tanggal Kerusakan</label>
            <input type="text" class="form-control" value="{{ $timestamp }}" readonly>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Nama Dosen</label>
            <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label>Ruangan</label>
            <select class="form-control" name="room_id" required>
                <option selected disabled>== Pilih Ruangan ==</option>
                @foreach ($rooms as $value => $key)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label>Mata Kuliah</label>
            <select class="form-control" name="room_id" required>
                <option selected disabled>== Pilih Mata Kuliah ==</option>
                @foreach ($mata_kuliah as $value => $key)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-md-12 column">
       <strong>Detail Kerusakan</strong> 
        <table class="table table-bordered table-hover" id="tab_logic1">
            <thead>
                <tr>
                    <th class="text-center">
                        #
                    </th>
                    <th class="text-center">
                        Pilih Fasilitas
                    </th>
                    <th class="text-center">
                        Deskripsi
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr id='facility_damage0'>
                    <td>
                        1
                    </td>
                    <td>
                        <select class="form-control" name="facility_id[0]" required>
                            <option selected disabled>== Pilih Fasilitas ==</option>
                            @foreach ($facility as $value => $key)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <textarea class="form-control" name="description[0]" cols="20" rows="3" required></textarea>
                    </td>
                </tr>
                <tr id='facility_damage1'></tr>
            </tbody>
        </table>

        <script src="{{ asset('js/jquery.js') }}"></script>
        <script>
            $(document).ready(function() {
                var i = 1;
                $("#add_row1").click(function() {
                    $('#facility_damage' + i).html("<td>" + (i + 1) +
                        "</td><td><select class='form-control' name='facility_id[" +
                        i +
                        "]' required><option selected disabled value=''>== Pilih Panitia ==</option>@foreach($facility as $value => $key)<option value='{{ $key }}'>{{ $value }}</option>@endforeach</select></td><td><textarea class='form-control' name='description["+
                        i +
                        "]' cols='20' rows='3' required></textarea></td>"
                        );

                    $('#tab_logic1').append('<tr id="facility_damage' + (i + 1) + '"></tr>');
                    i++;
                });
                $("#delete_row1").click(function() {
                    if (i > 1) {
                        $("#facility_damage" + (i - 1)).html('');
                        i--;
                    }
                });
            });
        </script>
    </div>
</div>
<span>
    <a id="add_row1" class="btn btn-warning"><i class="fas fa-plus"></i></a>
    <a id='delete_row1' class="btn btn-primary"><i class="fas fa-trash"></i></a>
</span>
