@extends('layouts.dash')
@section('content')
<div class="col-md-12">
@include('Wennec.alerts.errors')

<!-- Static Table Start -->
<div class="container_create_school">
      <div class="sign_in_left_section">
        <img src="../assets/img/create_school/logo_sing_in.png" alt="">
      </div>
      <div class="sign_in_rigth_section">
        <div class="form_sign_in">
          <!-- Form -->
          <img src="../assets/img/create_school/sing_in.png" alt="">
          <form class="form-horizontal" style="color: #757575;">

            <!-- Email -->
            <div class="row">
            <!-- Password -->
            <div class="form-group has-feedback has-feedback-left">
              <label class="control-label sr-only"></label>
              <div class=" col-sm-22">
                <input type="text" class="form-control input-lg" placeholder="nombre" />
                <i class="form-control-feedback fa fa-university"></i>
              </div>
            </div>
            <div class="form-group has-feedback has-feedback-left">
              <label class="control-label sr-only"></label>
              <div class=" col-sm-22">
                <input type="text" class="form-control input-lg" placeholder="ubicación" />
                <i class="form-control-feedback fa fa-map-marker"></i>
              </div>
            </div>
            <div class="form-group has-feedback has-feedback-left">
              <label class="control-label sr-only"></label>
              <div class=" col-sm-22">
                <input type="text" class="form-control input-lg" placeholder="representante legal" />
                <i class="form-control-feedback fa fa-user"></i>
              </div>
            </div>
            <div class="form-group has-feedback has-feedback-left">
              <label class="control-label sr-only"></label>
              <div class=" col-sm-22">
                <input type="text" class="form-control input-lg" placeholder="NIT" />
                <i class="form-control-feedback fa fa-file-text-o"></i>
              </div>
            </div>
            <div class="form-group has-feedback has-feedback-left">
              <label class="control-label sr-only"></label>
              <div class=" col-sm-22">
                <input type="text" class="form-control input-lg" placeholder="código del colegio" />
                <i class="form-control-feedback fa fa-lock"></i>
              </div>
            </div>
            <div class="form-group has-feedback has-feedback-left">
              <label class="control-label sr-only"></label>
              <div class=" col-sm-22">
                <input type="text" class="form-control input-lg" placeholder="repetir código" />
                <i class="form-control-feedback fa fa-lock"></i>
              </div>
            </div>
            <div class="image-upload">
              <label for="file-input">
                <img src="../assets/img/create_school/escudo.png" alt ="Click aquí para subir tu foto" title ="Click aquí para subir tu foto" >
              </label>

              <input id="file-input" type="file"/>
            </div>
            </div>
            <!-- Sign in button -->
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" id="btn_create_school" type="submit">Agregar colegio</button>
          </form>
        </div>
      </div>
      </div>
    </div>
</div>
@endsection
