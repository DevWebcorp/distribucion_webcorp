<link href="../../assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="../../assets/lib/select2/css/select2.min.css" rel="stylesheet">
<script src="../../assets/lib/jquery/jquery.js"></script>


<div class="sl-mainpanel">


  <div class="sl-pagebody">


    <div class="card pd-20 pd-sm-40">
      <h5 class="text-dark">EMPRESAS</h5>
      <div>
        <button class="btn btn-success mb-3" data-toggle="modal" data-target="#modaldemo1"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Nueva Empresa</button>
      </div>

      <h6 class="card-body-title">Tabla Empresas</h6>

      <div class="table-wrapper">
        <table id="datatable1" class="table table-responsive empresas" style="width: 100%;">
          <thead>
            <tr>
             
              <th class = "wd-15p">LOGO</th>
              <th class="wd-15p">MARCA</th>
              <th class="wd-15p">RAZÓN SOCIAL</th>
              <th class="wd-15p">RFC</th>
              <th class="wd-15p">DOMICILIO FISCAL</th>
              <th class="wd-15p">TELÉFONO</th>
              <th class="wd-15p">CORREO</th>
              <th class="wd-15p">Acción</th>
              <th class="wd-15p">Archivos</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($listarDatos as $key) : ?>
              <tr>
                <td><img class = "img-fluid" src = "../../public/images/logos/<?= $key->logo; ?>"></td>
                <td><?= $key->marca; ?></td>
                <td><?= $key->razon_social; ?></td>
                <td><?= $key->rfc; ?></td>
                <td><?= $key->address; ?></td>
                <td><?= $key->tel; ?></td>
                <td><?= $key->correo; ?></td>

                <td>
                  <div class="d-flex">
                    <button onclick="enviarId(<?= $key->id; ?>)" data-toggle="modal" data-target="#modal_actualizacion" class="btn btn-warning btn-update pd-x-20 mr-1"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Actualizar</button>
                    <button onclick="deleteId(<?= $key->id; ?>)" data-toggle="modal" data-target="#modaldemo2" class="btn btn btn-danger pd-x-20"><i class="fa fa-trash mr-1" aria-hidden="true"></i>Eliminar</button>
                  </div>
                </td>
                <td>
                  <form method="POST" action="<?= base_url() . '/Documentacion/doc_empresa' ?>">
                    <input class="form-control" type="hidden" name="id_empresa" value="<?= $key->id ?>">
                    <button class="btn btn-indigo" type="submit"><i class="fa fa-eye mr-1" aria-hidden="true"></i>Archivos</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
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

<!-- BASIC MODAL -->
<div id="modaldemo1" class="modal fade">
  <div class="modal-dialog modal-dialog-vertical-center" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header bg-success pd-y-20 pd-x-25">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Nueva empresa</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body pd-20">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Datos de la empresa</h6>
          <p class="mg-b-20 mg-sm-b-30">Llenar todos los campos</p>

          <form id="Empresa" method="POST" action="<?= base_url() . 'Empresas/crear' ?>" enctype="multipart/form-data">
            <div class="form-layout">
              <div class="row mg-b-25">

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">LOGO: <span class="tx-danger">*</span></label><br>
                    <span class="choose-file-button">Subir Archivo</span>
                    <span class="file-message">Arrastra el archivo aqui</span>
                    <input id="logo" class="file-input" type="file" multiple required accept=".mp4, .jpg, .png" name="logo">
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">MARCA: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="marca" placeholder="MARCA" required>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">RAZON SOCIAL: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="razon" placeholder="RAZON SOCIAL" required>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">RFC: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="rfc" placeholder="RFC" required>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">DOMICILIO FISCAL: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="direccion" placeholder="DOMICILIO FISCAL" required>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">TELÉFONO: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="number" name="tel" placeholder="TELÉFONO" required>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">CORREO: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="email" name="correo" placeholder="CORREO" required>
                  </div>
                </div>

                <!--  <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                  </div>
                </div> -->

                <!-- <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Dirección: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="direccion" placeholder="Dirección" required>
                  </div>
                </div> -->
              </div>
            </div>
          </form>
        </div> <!-- card -->

        <div class="modal-footer">
          <button type="submit" id="enviarform" form="Empresa" class="btn btn-success pd-x-20"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Agregar</button>
          <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
        </div><!-- modal-footer -->

      </div><!-- modal-body -->
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modaldemo1 -->

<!-- MODAL para actualizar datos de la empresa -->
<div id="modal_actualizacion" class="modal fade">
  <div class="modal-dialog modal-dialog-vertical-center" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header bg-warning pd-y-20 pd-x-25">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Actualizar datos</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="pd-20">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Datos de la empresa</h6>
          <p class="mg-b-20 mg-sm-b-30">Edite el campo que quiere actualizar.</p>
          <form id="prueba" method="POST" action="<?= base_url() . 'Empresas/editarDatos' ?>">
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Nombre: </label>
                    <input class="form-control" id="nombre" type="text" name="nombre" placeholder="Nombre">
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">LOGO: <span class="tx-danger">*</span></label>
                    <span class="choose-file-button">Subir Archivo</span>
                    <span class="file-message">Arrastra el archivo aqui</span>
                    <input id="logo" class="file-input" type="file" multiple required accept=".mp4, .jpg, .png" name="logo">
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">MARCA: <span class="tx-danger">*</span></label>
                    <input id="marca" class="form-control" type="text" name="marca" placeholder="MARCA" required>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">RAZON SOCIAL: <span class="tx-danger">*</span></label>
                    <input id="razon" class="form-control" type="text" name="razon" placeholder="RAZON SOCIAL" required>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">RFC: <span class="tx-danger">*</span></label>
                    <input id="rfc" class="form-control" type="text" name="rfc" placeholder="RFC" required>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">DOMICILIO FISCAL: <span class="tx-danger">*</span></label>
                    <input class="form-control" id="direccion" type="text" name="direccion" placeholder="Dirección">
                    <input class="form-control" id="id_empresa" type="hidden" name="id">
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">TELÉFONO: <span class="tx-danger">*</span></label>
                    <input id="tel" class="form-control" type="text" name="tel" placeholder="TEL" required>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">CORREO: <span class="tx-danger">*</span></label>
                    <input id="correo" class="form-control" type="email" name="correo" placeholder="CORREO" required>
                  </div>
                </div>

                <!-- <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Dirección: </label>
                    <input class="form-control" id="direccion" type="text" name="direccion" placeholder="Dirección">
                    <input class="form-control" id="id_empresa" type="hidden" name="id">
                  </div>
                </div> -->
              </div>
            </div>
          </form>
        </div>
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="submit" form="prueba" class="btn btn-warning pd-x-20"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Actualizar</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
      </div><!-- modal-footer -->
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal_actualizacion -->


<!-- MODAL para eliminar empresa-->
<div id="modaldemo2" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header bg-danger pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Eliminar empresa</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <p class="mg-b-5">¿Desea eliminar estos datos? </p>
        <form id="DeleteForm" method="POST" action="<?= base_url() . 'Empresas/borrar' ?>">
          <input class="form-control" id="id_emp" name="id_emp" type="hidden">
        </form>
      </div>
      <div class="modal-footer justify-content-center">
        <button form="DeleteForm" type="submit" class="btn btn-danger pd-x-20"><i class="fa fa-trash mr-1" aria-hidden="true"></i>Eliminar</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
      </div>
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modaldemo2 -->

<script src="../../assets/lib/datatables/jquery.dataTables.js"></script>
<script src="../../assets/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="../../assets/lib/select2/js/select2.min.js"></script>

<script>
  $('#datatable1').DataTable({
    language: {
      searchPlaceholder: 'Buscar...',
      sSearch: '',
      lengthMenu: '_MENU_ Filas por página',
    }
  });

  $('#datatable2').DataTable({
    bLengthChange: false,
    searching: false,
    responsive: true
  });

  //Actualizar datos de la empresa
  function enviarId(id) {
    //alert(id);
    const ruta = "<?= base_url(); ?>/empresas/obtenerEmpresa";
    data = {
      id: id
    }

    $.ajax({
      type: "POST",
      url: ruta,
      dataType: "JSON",
      data: data,
      success: function(response) {
        console.log(response);

        $("#nombre").val(response[0].business_name);
        $("#file-logo").val(response[0].logo);
        $("#direccion").val(response[0].address);
        $("#id_empresa").val(response[0].id);
        $('#marca').val(response[0].marca);
        $('#razon').val(response[0].razon_social);
        $('#rfc').val(response[0].rfc)
        $('#tel').val(response[0].tel)
        $('#correo').val(response[0].correo)
      },
    });
  }

  //Eliminar id traido de la base
  function deleteId(id) {
    $("#id_emp").val(id);
  }
</script>