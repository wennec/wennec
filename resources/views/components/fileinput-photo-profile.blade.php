
{{-- fileinput
    ** args
    title1 -> Titulo del desplegable
    label1 -> label cambiar
    label2 -> label quitar
    url -> url de la imagen
    name -> nombre del input
    attributes -> atributo del input
--}}

<div class="form-group">
    <div>
        <div>
            <img alt="" src="Foto/Usuarios/{{auth()->user()->foto ?: '/img/default.png'}}" id="fotografia_usuario" />
        </div>
            <input name="{{$name}}" type="file" class="form-control-image" {{$attributes}}/>
    </div>
</div>
