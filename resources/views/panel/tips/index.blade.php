@extends('panel::layouts.default')

@section('page-title','Tips')
@section('page-subtitle','Lista de todos los datos registrados')

@section('content')



<div class="box">
    <div class="box-header">
        <h3 class="box-title">Datos</h3>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="tips" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Lugar</th>
                    <th>Imagen</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tips as $tip)
                    <tr class="error">
                        <td>{{ $tip->name }}</td>
                        <td>{{ $tip->place_name }}</td>
                        <td><img width="100" src='{{ $tip->image() }}' alt="" /></td>
                        <td>
                            <ul>
                                <li><a href="{{ route('tip.edit',$tip->id) }}">Aprobar</a></li>
                                <li><a href="{{ route('tip.edit',$tip->id) }}">Editar</a></li>
                                <li><a href="{{ route('tip.edit',$tip->id) }}">Eliminar</a></li>
                            </ul>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Lugar</th>
                    <th>Imagen</th>
                    <th>Opciones</th>

                </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
@stop

@section('js')
<script type="text/javascript">
    $(function() {
        $('#tips').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>
@stop

