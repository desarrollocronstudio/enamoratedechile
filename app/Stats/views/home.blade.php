@extends('panel::layouts.default')
@section('page-title','Reportes')
@section('page-subtitle','Selecciona el reporte que deseas obtener')
@section('content')

    {!! Form::open(['method' => 'GET','route' => 'panel.stats.generate_report']) !!}
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Selecciona rango de fechas y reporte</h3>
        </div>
        <div class="box-body">

            <div class="row">

                <div class="col-md-6">
                    <!-- select -->
                    <div class="form-group">
                        <label>Select</label>
                        <select name="type" class="form-control">
                            @foreach($reports as $key => $report)
                                <option value="{{$key}}">{{$report}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Date and time range -->
                    <div class="form-group">
                        <label for="reservationtime">Selecciona un rango de fechas:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="daterange" id="reservationtime" class="form-control" value="" />
                        </div>
                    </div><!-- /.form group -->
                </div>


             </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Generar reporte</button>
        </div>
    </div>
    {!! Form::close() !!}


    <div class="row">

        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Datos totales</h3>
                </div>
                <div class="box-body">
                    <h1 style="margin-top: 0">{{ $total_tips }}</h1>
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')
    <!-- daterange picker -->
    <link href="{!! asset('packages/panel-core/css/daterangepicker/daterangepicker-bs3.css') !!}" rel="stylesheet" type="text/css" />

    <!-- date-range-picker -->
    <script src="{!! asset('packages/panel-core/js/plugins/daterangepicker/daterangepicker.js') !!}" type="text/javascript"></script>
    <script>
        $('#reservationtime').daterangepicker(
                {
                    ranges: {
                        'Lun-Dom':[moment().isoWeekday(1),moment().isoWeekday(7)],
                        'Últimos 30 Días': [moment().subtract('days', 29), moment()]
                    },
                    format:'YYYY/MM/DD',
                    opens:'center'
                },
        function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

    </script>
@stop