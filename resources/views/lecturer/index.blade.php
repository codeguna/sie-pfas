@extends('layouts.dashboard')

@section('title')
    Lecturer
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-right">
                                <button class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                    data-target="#lecturerModal" data-placement="left">
                                    <i class="fa fa-plus"></i>
                                </button>
                                @include('lecturer.modal')
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
                                        <th>Nama</th>
                                        <th>Nip</th>
                                        <th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lecturers as $lecturer)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $lecturer->user->name }}</td>
                                            <td>{{ $lecturer->nip }}</td>
                                            <td>
                                                @if ($lecturer->status == 1)
                                                    <span class="badge bg-success">Dosen Tetap</span>
                                                @else
                                                    <span class="badge bg-warning">Dosen LB</span>
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('admin.lecturers.destroy', $lecturer->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.lecturers.show', $lecturer->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.lecturers.edit', $lecturer->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $lecturers->links() !!}
            </div>
        </div>
    </div>
@endsection
