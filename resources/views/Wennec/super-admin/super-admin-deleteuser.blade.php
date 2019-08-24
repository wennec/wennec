{!!Form::open(['method' => 'DELETE', 'route' => ['usuarios.destroy',$user->PK_id]])!!}
    {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}
{!!Form::close()!!}
