
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
            <select class="form-control" name="mata_kuliah" required>
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
       <div class="table-responsive">
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
       </div>
        

        <script src="{{ asset('js/jquery.js') }}"></script>
        <script>
            $(document).ready(function() {
                var i = 1;
                $("#add_row1").click(function() {
                    $('#facility_damage' + i).html("<td>" + (i + 1) +
                        "</td><td><select class='form-control' name='facility_id[" +
                        i +
                        "]' required><option selected disabled value=''>== Pilih Fasilitas ==</option>@foreach($facility as $value => $key)<option value='{{ $key }}'>{{ $value }}</option>@endforeach</select></td><td><textarea class='form-control' name='description["+
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
    <a id='delete_row1' class="btn btn-danger"><i class="fas fa-trash"></i></a>
</span>
<hr>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>
