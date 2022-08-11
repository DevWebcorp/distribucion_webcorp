<script src="../../../assets/lib/jquery/jquery.js"></script>
    <!-- ########## START: MAIN PANEL ########## -->

    <script type="text/javascript">
      let numero_error=<?php echo $error;?>;
      if(!numero_error==0){
        alert('Ya hay un correo registrado por favor ingrese uno nuevo');
      }
    </script>
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <form method="POST" action="<?php echo base_url().'/users/insert_client'?>" enctype="multipart/form-data">
              <h6 class="card-body-title">Registro</h6>
              <p class="mg-b-20 mg-sm-b-30">Inserte por favor los siguientes campos.</p>
              <div class="row">
                <label class="col-sm-4 form-control-label">Nombre de usuario: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="username" placeholder="Nombre" required>
                </div>
              </div><!-- row -->
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Correo electrónico: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="email" placeholder="correo@gmail.com" required>
                </div>
              </div>
              <div class="row mg-t-20 formulario__grupo" id="grupo__password">
                <label class="col-sm-4 form-control-label">Contraseña:</label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="password" id="show_hide_password" class="form-control" name="password" placeholder="*********" >
                 
                  <div class="d-none input-group-addon">
                      <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                  </div>
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Selecciona el tipo de grupo: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <select name="id_group" class="form-control" id="id_group" required>
                    <option value="">Selecciona un grupo</option>

                    <?php foreach($groups as $key): ?>
                      <option value="<?php echo $key->id ?>"><?php echo $key->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div> 

              <!--Foto de perfil-->
                <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Foto de perfil</label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="file" class="form-control" name="file">
                </div>
              </div>

              <!--Business-->
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Empresa</label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <select name="id_empresa" class="form-control">
                    <?php foreach($busine as $key):?>
                      <option value="<?php echo $key-> id;?>"><?php echo $key->business_name;?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
              <!---->

              <!--Clientes-->
              <div class="row mg-t-20" id="aggreate_data_client">

              </div>

              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Puesto: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <textarea rows="2" class="form-control" name="about" placeholder="Puesto" required></textarea>
                </div>
              </div>
              <div class="form-layout-footer text-right mg-t-30">
                <button class="btn btn-info mg-r-5" type="submit"><i class="fa fa-paper-plane-o mr-1" aria-hidden="true"></i>Enviar</button>

              </div><!-- form-layout-footer -->
            </form>

            </div><!-- card -->
          </div><!-- col-6 -->

        </div><!-- row -->

     <!--   <script type="text/javascript">

          $('#id_group').change(function(){
            let select_group=document.getElementById('id_group');
            let selected_type_group_value = select_group.options[select_group.selectedIndex].value;
              if(selected_type_group_value==2){
              $('#aggreate_data_client').html('<div class="row mg-t-20" id="div_client"><label class="col-sm-4 form-control-label">Nombre del cliente<span class="tx-danger">*</span></label><div class="col-sm-8 mg-t-10 mg-sm-t-0 mg-b-10"><input type="text" name="name_client" class="form-control"></div><label class="col-sm-4 form-control-label">RFC<span class="tx-danger">*</span></label><div class="col-sm-8 mg-t-10 mg-sm-t-0 mg-b-10"><input type="text" name="rfc" class="form-control"></div><label class="col-sm-4 form-control-label">Pais<span class="tx-danger">*</span></label><div class="col-sm-8 mg-t-10 mg-sm-t-0 mg-b-10"><input type="text" name="address_country" class="form-control"></div><label class="col-sm-4 form-control-label">Municipio<span class="tx-danger">*</span></label><div class="col-sm-8 mg-t-10 mg-sm-t-0 mg-b-10"><input type="text" name="addres_county" class="form-control"></div><label class="col-sm-4 form-control-label">Ciudad<span class="tx-danger">*</span></label><div class="col-sm-8 mg-t-10 mg-sm-t-0 mg-b-10"><input type="text" name="addres_city" class="form-control"></div><label class="col-sm-4 form-control-label">Calle<span class="tx-danger">*</span></label><div class="col-sm-8 mg-t-10 mg-sm-t-0 mg-b-10" ><input type="text" name="address_street" class="form-control"></div><label class="col-sm-4 form-control-label">Codigo postal<span class="tx-danger">*</span></label><div class="col-sm-8 mg-t-10 mg-sm-t-0 mg-b-10"><input type="text" name="address_postal_code" class="form-control"></div><label class="col-sm-4 form-control-label">Numero<span class="tx-danger">*</span></label><div class="col-sm-8 mg-t-10 mg-sm-t-0 mg-b-10"><input type="text" name="address_number" class="form-control"></div></div>');
              }else{
                $('#div_client').remove();
              }

          });
        </script>-->




      </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script>
      passwd();

      function passwd() {
          $("#show_hide_password a").on('click', function(event) {
              event.preventDefault();
              if ($('#show_hide_password input').attr("type") == "text") {
                  $('#show_hide_password input').attr('type', 'password');
                  $('#show_hide_password i').addClass("fa-eye-slash");
                  $('#show_hide_password i').removeClass("fa-eye");
              } else if ($('#show_hide_password input').attr("type") == "password") {
                  $('#show_hide_password input').attr('type', 'text');
                  $('#show_hide_password i').removeClass("fa-eye-slash");
                  $('#show_hide_password i').addClass("fa-eye");
              }
          });
      }
    </script>

