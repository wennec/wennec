{!!Form::model($calificacionEstudiante, ['route' => ['calificacion.update',$calificacionEstudiante], 'method' => 'PUT', 'enctype'=>'multipart/form-data'])!!}
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group form-md-line-input">
            <label for="">materia</label>
        </div>
        <div class="form-group form-md-line-input">
            <label for="">logro</label>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group form-md-line-input">
            {!!Form::text('calificacion',null,['class'=>'form-control','placeholder'=>'Calificacion','required'])!!}
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Editar Calificacion</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
    </div>

</div>
{!! Form::close() !!}