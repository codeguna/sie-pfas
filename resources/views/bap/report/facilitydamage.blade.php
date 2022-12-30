@extends('layouts.dashboard')
@section('title')
    Report Kerusakan
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-lg-12 -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $chartDamage->options['chart_title'] }}
                        <p><em>dalam {{ $periode }} hari terakhir</em></p>
                    </div>
                    <div class="card-body" style="padding: 5em">
                        <h4 class="card-title"></h4>
                        <p class="card-text">{!! $chartDamage->renderHtml() !!}</p>
                    </div>
                </div>



            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('javascript')
    {!! $chartDamage->renderChartJsLibrary() !!}
    {!! $chartDamage->renderJs() !!}
@endsection
