@extends('layouts.app')

@section('template_title')
    Facility Damage
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Facility Damage') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('facility-damages.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Bap Id</th>
										<th>Facility Id</th>
										<th>Description</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($facilityDamages as $facilityDamage)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $facilityDamage->bap_id }}</td>
											<td>{{ $facilityDamage->facility_id }}</td>
											<td>{{ $facilityDamage->description }}</td>

                                            <td>
                                                <form action="{{ route('facility-damages.destroy',$facilityDamage->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('facility-damages.show',$facilityDamage->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('facility-damages.edit',$facilityDamage->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $facilityDamages->links() !!}
            </div>
        </div>
    </div>
@endsection
