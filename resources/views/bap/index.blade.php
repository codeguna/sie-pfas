@extends('layouts.dashboard')

@section('title')
    Bap
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Bap') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.baps.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>User Id</th>
                                        <th>Employee Id</th>
                                        <th>Ticket Code</th>
                                        <th>Room Id</th>
                                        <th>Mata Kuliah</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Fixed Date</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($baps as $bap)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $bap->user_id }}</td>
                                            <td>{{ $bap->employee_id }}</td>
                                            <td>{{ $bap->ticket_code }}</td>
                                            <td>{{ $bap->room_id }}</td>
                                            <td>{{ $bap->mata_kuliah }}</td>
                                            <td>{{ $bap->description }}</td>
                                            <td>{{ $bap->status }}</td>
                                            <td>{{ $bap->fixed_date }}</td>

                                            <td>
                                                <form action="{{ route('admin.baps.destroy', $bap->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.baps.show', $bap->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.baps.edit', $bap->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $baps->links() !!}
            </div>
        </div>
    </div>
@endsection
