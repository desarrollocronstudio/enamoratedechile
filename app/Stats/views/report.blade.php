@extends('panel::layouts.default')
@section('page-title','Reporte')
@section('content')

    <div class="row">
        <div class="col-md-{{$cols or 12}}">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ $title }}</h3>
                </div>
                <div class="box-body">

                    <table class="table">
                        <thead>
                            @foreach($headers as $header)
                                <th>{{$header}}</th>
                            @endforeach
                        </thead>

                        <tbody>
                            @if(count($data))
                                @foreach($data as $row)
                                    <tr>
                                    @foreach($row as $col)
                                     <td>{{$col}}</td>
                                    @endforeach
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="100" style="text-align: center">No se encontraron resultados</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>


                </div>
                <div class="box-footer">
                    <a href="{{ URL::route('panel.stats.index') }}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}


@stop
@section('js')


@stop