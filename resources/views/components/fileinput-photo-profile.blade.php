
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
            <div style="position:relative;">
		<a class='btn btn-primary' href='javascript:;'>
			Cambiar Foto
			<input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="{{$name}}" size="40"  onchange='$("#upload-file-info").html($(this).val());' {{$attributes}}>
		</a>
		&nbsp;
		<span class='label label-info' id="upload-file-info"></span>
	</div>
    </div>
</div>
