{!!Form::open(['route' => ['actividad.destroy',$actividad->id], 'method' => 'DELETE'])!!} 
        {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }} 
{!!Form::close()!!} 