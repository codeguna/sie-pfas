@extends('layouts.dashboard')
@section('title')
    Report Ruangan
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-lg-12 -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $chartGeneral->options['chart_title'] }}
                        <p><em>dalam 30 hari terakhir</em></p>
                    </div>
                    <div class="card-body" style="padding: 10em">
                        <h4 class="card-title"></h4>
                        <p class="card-text">{!! $chartGeneral->renderHtml() !!}</p>
                    </div>
                </div>



            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('javascript')
    {!! $chartGeneral->renderChartJsLibrary() !!}
    {!! $chartGeneral->renderJs() !!}
@endsection
