{!!Form::open(['method' => 'DELETE', 'route' => ['departamentos.destroy',$colegio->id]])!!}
        {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}
    {!!Form::close()!!}
