<link href="../../assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="../../assets/lib/select2/css/select2.min.css" rel="stylesheet">
<script src="../../assets/lib/jquery/jquery.js"></script>


<div class="sl-mainpanel">

  <div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40">
      <h5 class="text-dark">Usuarios</h5>

      <div class="col-12 mb-4">
        <a href="<?php echo base_url() . '/users/new_user' ?>" class="btn btn-success pd-x-20"><i class="fa fa-user-plus mr-1" aria-hidden="true"></i>Nuevo usuario</a>
      </div>
      <h6 class="card-body-title">Tabla Ventas</h6>
      <!--<p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will</p>-->
      <!-- Large modal -->


      <div class="table-wrapper">
        <table id="datatable1" class="table table-responsive ventas" style="width: 100%;">
          <thead>
            <tr>
              <th class="wd-15p">Foto</th> 
              <th class="wd-15p">Nombre</th>
              <th class="wd-15p">Correo electrónico</th>
              <th class="wd-20p">Puesto</th>
              <th class="wd-20p">Acciones</th>
            </tr>
          </thead>
          <tbody>
           
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->

  </div><!-- sl-pagebody -->
  <footer class="sl-footer">
    <div class="footer-left">
      <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
      <div>Made by ThemePixels.</div>
    </div>
    <div class="footer-right d-flex align-items-center">
      <span class="tx-uppercase mg-r-10">Share:</span>
      <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
      <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
    </div>
  </footer>
</div><!-- sl-mainpanel -->


<!-- Modal Detalle  -->

<div id="modaldetalle" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Detalle</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <button class="btn btn-success" form="#obtenerid" id="getId" data-toggle="modal" data-target="#uploadfile">Subir Archivos</button>
        <br>
        <br>
        <div class="table-wrapper">
          <table id="datatable3" class="table table-bordered table-primary">
            <thead class="bg-info">
              <tr>
                <th class="wd-10p">Datos Venta</th>
              </tr>
            </thead>
            <tbody id="dataventa">
              <!-- aqui van los datos de la tabla de archivos -->

            </tbody>
          </table>
        </div><!-- table-wrapper -->
        <br>
        <br>
        <div class="card pd-0 pd-sm-0">
          <h6 class="card-body-title">Archivos</h6>
          <br>
          <br>



          <div class="table-wrapper">
            <!--<p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>-->

            <div class="table-wrapper">
              <table id="datatable3" class="table table-bordered table-primary">
                <thead class="bg-info">
                  <tr>
                    <th class="wd-10p">Archivos</th>
                  </tr>
                </thead>
                <tbody id="datarchivos">
                  <!-- aqui van los datos de la tabla de archivos -->

                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->
        </div><!-- modal-body -->
      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->
</div>

<!-- Modal Crear contrato -->
<div id="modalcontrato" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content largo">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Selecciona Contrato</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="DeleteProduct" method="POST" action="<?php echo base_url() ?>/contratos/generar_contrato">
          <div class="col-lg-12">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Contrato: <span class="tx-danger">*</span></label>
              <select name="productos" class="form-control select2" data-placeholder="Choose contract" required>
                <option value="" name="user">Selecciona Contrato</option>

              </select>
              <br>
              <iframe src="" id="iframe" width="100%" height="300"></iframe>
              <br>
              <button class="btn btn-success pd-x-20 btn-create-contract btn_save_view">Guardar</button>

              <input type="hidden" name="id_venta" value="" id="id_venta" class="id_venta">
            </div>
          </div><!-- col-4 -->

        </form>
      </div>
      <div class="modal-footer justify-content-center">
        <button form="DeleteProduct" type="submit" class="btn btn-outline-success btn-block mg-b-10">Aceptar</button>
        <button type="button" class="btn btn-outline-secondary btn-block mg-b-10" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- modal subir archivos-->

<div id="modal_update" class="modal fade">
  <div class="modal-dialog modal-dialog-vertical-center" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header bg-warning pd-y-20 pd-x-25">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Actualizar usuario</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?php echo base_url() . '/Users/update_users' ?>" enctype="multipart/form-data">
        <div class=" pd-25">
          <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
            <p class="mg-b-20 mg-sm-b-30">Edite el campo que quiere actualizar.</p>
            <div class="row">
              <!--   <label class="col-sm-4 form-control-label">Nombre de usuario: <span class="tx-danger">*</span></label>-->
              <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                <label>Nombre</label>
                <input type="text" class="form-control" name="update_name" id="update_name" placeholder="Nombre de usuario" required>
              </div>
            </div><!-- row -->
            <div class="row mg-t-20">
              <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                <label>Correo electrónico</label>
                <input type="email" class="form-control" name="email_update" id="email_update" placeholder="Correo" required>
              </div>
            </div>
            <div class="row mg-t-20">
              <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                <label>Contraseña</label>
                <input type="password" class="form-control" name="password_update" id="password_update" placeholder="Contrasena" required>
              </div>
            </div>
            <div class="col-sm-12 mg-t-20 px-0">
              <label>Tipo de grupo</label>
              <select class="form-control" id="upd_grupo" name="id_update_groups">
                <?php foreach ($groups as $key) :  ?>
                  <option value="<?php echo $key->id; ?>"><?php echo $key->name;  ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <!--Foto de perfil-->
            <div class="row mg-t-20">
              <label class="col-12 form-control-label">Foto de perfil</label>
              <div class="col-12 mg-t-10 mg-sm-t-0">
                <input type="file" class="form-control" id="foto" name="foto">
                <input type="hidden" name="nameimg" id="nameimg">
              </div>
            </div>
            <div class="row">
                <div id="imagen" class="col-lg-4">

                </div>
            </div>
            <div class="row mg-t-20">
              <label class="col-12 form-control-label">Empresa</label>
              <div class="col-12 mg-t-10 mg-sm-t-0">
              <select id="upd_empresa" name="id_update_empresa" class="form-control">
                <?php foreach($busine as $key):?>
                  <option value="<?php echo $key-> id;?>"><?php echo $key->business_name;?></option>
                <?php endforeach;?>
              </select>
              </div>
            </div>

            <div class="row mg-t-20">
              <div class="col-12">
                <label class="form-control-label">Puesto</label>
                <textarea rows="2" class="form-control" name="update_about" id="update_about" placeholder="Puesto" required></textarea>
                <input type="hidden" name="id_users" id="id_users">
              </div>
            </div>
          </div><!-- card -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-warning pd-x-20"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Actualizar usuario</button>
          <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
        </div>
      </form>

    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->


<!--Modal delete-->
<div id="modal_delete" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header bg-danger  pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Eliminar</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?php echo base_url() . '/Users/borrar_usuarios' ?>">
        <div class="modal-body pd-20">
          <p class="mg-b-5">¿Deseas eliminar estos datos? </p>
          <input type="hidden" name="id" id="id_delete">
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-danger pd-x-20"><i class="fa fa-trash mr-1" aria-hidden="true"></i>Eliminar</button>

          <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
        </div>
      </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->




<!--Modal de tamaño grande-->



<script src="../../assets/lib/datatables/jquery.dataTables.js"></script>
<script src="../../assets/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="../../assets/lib/select2/js/select2.min.js"></script>





<script>
  let global_id = 0;
  let global_id_venta = 0;

  $('.btn-create-contract').on('click', function() {

    let id = $(this).attr('id');
    $('#id_venta').attr('value', id);
  })

  //Aqui selecciono el tipo de contrato
  $("select[name=productos]").change(function() {
    let id = $('select[name=productos]').val();
    let id_v = $('#id_venta').val();

    let data = {
      productos: id,
      id_venta: id_v
    }


    $('#iframe').attr('src', "<?php echo base_url() . '/contratos/generar_contrato/' ?>" + id + "/" + id_v);
    global_id = id;
    global_id_venta = id_v;


  }); //select


  $('.btn_save_view').on('click', function(e) {
    e.preventDefault();
    if (global_id == 0) {
      alert("Seleccione un contrato a subir");
      return 1;
    }
    let data = {
      productos: global_id,
      id_venta: global_id_venta
    }
    $.ajax({
      type: "POST",
      url: "<?= base_url(); ?>/contratos/generar_get",
      dataType: "JSON",
      data: data,
      success: function(response) {

        console.log(response);
        alert('Guardado exitosamente');
        $('#modalcontrato').modal('hide');
        $("#iframe").attr('src', '');
        global_id = 0;
        global_id_venta = 0;

      }

    });

  })
  //Peticion de archivos

  /*function mandarId(id) {
    $("#id_venta").val(id);

    $("#id_sale").val(id);
    const ruta = "<?= base_url(); ?>/ventas/tabla_detalle";

    data = {
      id_sales: id

    }

  $.ajax({
    type: "POST",
    url: ruta,
    dataType: "JSON",
    data: data,
    success: function() {
      console.log(response);

      let html = '';
          let i;

          for (i = 0; i < response.length; i++) {
            var filename = response[i].path.substring(response[i].path.lastIndexOf('/')+1);
            html += '<tr>' +
              '<td>' + '<a href="'+"../"+response[i].path+'">'+filename+'</a>' + '</td>' +

              '</tr>';
          }
          $('#datarchivos').html(html);

    },

  });


    }*/


  function deleteId(id) {
    $("#id_vent").val(id);

  }

/*   BASE_URL = 'http://localhost/solimaq/public/index.php/'; */
  var dataTable = $('#datatable1').DataTable({
    ajax: BASE_URL + '/Users/tabla_usuarios',
    
    columns: [
         {
            data: 'photo',
            render: function(data, type, row, meta) {
                return data == '' ? '<img style="width:70px; height: 70px;" src="../../public/images/default_user.png" class="img-fluid" />' : '<img style="width:70px; height: 70px;" src="../../public/images/' + data +  ' " class="img-fluid" />'
            }
        }, 
        {
            data: 'user_name'
        },
        {
            data: 'email'
        },
        {
            data: 'about'
        },
        {
            data: "id",
            render: function(data, type, row, meta) {
                return '<button id="' + row.id + '"" data-toggle="modal" data-target="#modal_update" class="btn btn-warning  btn-update pd-x-20 mr-1"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Actualizar</button>' + 
                    '<button id="' + row.id + '" data-toggle="modal" data-target="#modal_delete" class="btn btn-danger elimina pd-x-20"><i class="fa fa-trash mr-1" aria-hidden="true"></i>Eliminar</button>' 
            }
        },
    ],
    language: {
      searchPlaceholder: 'Buscar...',
      sSearch: '',
      lengthMenu: '_MENU_ Filas por página',
    }
  });

  $(document).on('click', '.btn-update', function() {
    
    let id_buton = $(this).attr('id');
    $('#id_payment').val(id_buton);
    let json = {
      id: id_buton
    };
    $.ajax({
      url: '<?php echo base_url() . '/Users/get_users_json' ?>',
      type: "POST",
      data: json,
      dataType: "JSON",
      success: function(success) {
        console.log(success);
        $('#update_name').val(success[0].user_name);
        $('#email_update').val(success[0].email);
        $('#password_update').val('12345');
        $('#upd_grupo').val(success[0].id_group);
        $('#upd_empresa').val(success[0].business_id);
        $('#nameimg').val(success[0].photo);
        $('#update_about').val(success[0].about);
        $('#id_users').val(id_buton);

        let html = '';
          html += '<img src="../../public/images/' + success[0].photo + '" class="img-thumbnail" style="height =80px"/>'
          $('#imagen').html(html);
      }

    }); //AJAX

    $('#modal_update').modal('show');
  });



  $(document).on('click', '.elimina', function() {
    let id = $(this).attr('id');
    $('#id_delete').val(id);
    $('#modal_delete').modal('show');

  });

  //peticion de contratos
</script>