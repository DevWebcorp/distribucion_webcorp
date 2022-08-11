<link href="../../../assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="../../../assets/lib/select2/css/select2.min.css" rel="stylesheet">
<script src="../../../assets/lib/jquery/jquery.js"></script>

<div class="sl-mainpanel">

  <div class="sl-pagebody">

    <div class="card pd-20 pd-sm-40">

      <div>
        <h5 class="text-dark">Documentación</h5>
        <!--<button class="btn btn-success" onclick="location.href='<?php echo base_url(); ?>/proveedores/agregar'">+ NUEVO PROVEEDOR</button>-->
        <button class="btn btn-success mb-3" data-toggle="modal" data-target="#modaldemo3"><i class="fa fa-upload mr-1" aria-hidden="true"></i>Subir Documentación</button>
      </div>
      <h6 class="card-body-title"><?php echo $dataempresa[0]->business_name; ?></h6>
      <!--<p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will</p>-->

      <div class="table-wrapper">
        <table id="datatable1" class="table table-responsive documentos-empresa" style="width: 100%;">
          <thead>
            <tr>
              <th class="wd-20p">Tipo de Archivo</th>
              <th class="wd-20p">NOMBRE DEL ARCHIVO</th>
              <th class="wd-20p">VER PDF</th>
              <th class="wd-20p">ELIMINAR</th>

          </thead>
          <tbody>

            <tr>
              <td>ACTA CONSTITUTIVA</th>
                <?php
                foreach ($select_documents as $documents) {
                  $filename =  basename($documents->name_file);
                  // print_r($documents);
                  if ($documents->type_file == 'ACTA CONSTITUTIVA') {
                    echo ('<td>' . $filename . '</td>');
                    echo ('<td>' . '<a href="../../' . $documents->name_file . '" target="_blank">' . '  <button type="button" class="btn btn-indigo mg-b-10" data-dismiss="modal"><i class="fa fa-eye mr-1" aria-hidden="true"></i>' . 'VER PDF' . '</button>' . '</a>');
                    echo ('<td>' . '<button class="btn btn-danger" data-toggle="modal" data-target="#modaldemo2" onclick="deleteId(' . $documents->id . ')"><i class="fa fa-trash mr-1" aria-hidden="true"></i>' . 'Eliminar' . '</button>' . '</td>');
                  }
                }

                ?>
            </tr>

            <tr>
              <td>PODER NOTARIAL</th>
                <?php
                foreach ($select_documents as $documents) {
                  $filename =  basename($documents->name_file);
                  // print_r($documents);
                  if ($documents->type_file == 'PODER NOTARIAL') {
                    echo ('<td>' . $filename . '</td>');
                    echo ('<td>' . '<a href="../../' . $documents->name_file . '" target="_blank">' . '  <button type="button" class="btn btn-warning mg-b-10" data-dismiss="modal">' . 'VER PDF' . '</button>' . '</a>');
                    echo ('<td>' . '<button class="btn btn-danger" data-toggle="modal" data-target="#modaldemo2" onclick="deleteId(' . $documents->id . ')">' . 'Eliminar' . '</button>' . '</td>');
                  }
                }

                ?>
            </tr>

            <tr>
              <td>REGISTRO PUBLICO</th>
                <?php
                foreach ($select_documents as $documents) {
                  $filename =  basename($documents->name_file);
                  // print_r($documents);
                  if ($documents->type_file == 'REGISTRO PUBLICO') {
                    echo ('<td>' . $filename . '</td>');
                    echo ('<td>' . '<a href="../../' . $documents->name_file . '" target="_blank">' . '  <button type="button" class="btn btn-warning mg-b-10" data-dismiss="modal">' . 'VER PDF' . '</button>' . '</a>');
                    echo ('<td>' . '<button class="btn btn-danger" data-toggle="modal" data-target="#modaldemo2" onclick="deleteId(' . $documents->id . ')">' . 'Eliminar' . '</button>' . '</td>');
                  }
                }

                ?>
            </tr>

            <tr>
              <td>IFE REP LEGAL</th>
                <?php
                foreach ($select_documents as $documents) {
                  $filename =  basename($documents->name_file);
                  // print_r($documents);
                  if ($documents->type_file == 'IFE REP LEGAL') {
                    echo ('<td>' . $filename . '</td>');
                    echo ('<td>' . '<a href="../../' . $documents->name_file . '" target="_blank">' . '  <button type="button" class="btn btn-warning mg-b-10" data-dismiss="modal">' . 'VER PDF' . '</button>' . '</a>');
                    echo ('<td>' . '<button class="btn btn-danger" data-toggle="modal" data-target="#modaldemo2" onclick="deleteId(' . $documents->id . ')">' . 'Eliminar' . '</button>' . '</td>');
                  }
                }

                ?>
            </tr>

            <tr>
              <td>COMPROBANTE DE DOMICILIO</th>
                <?php
                foreach ($select_documents as $documents) {
                  $filename =  basename($documents->name_file);
                  // print_r($documents);
                  if ($documents->type_file == 'COMPROBANTE DE DOMICILIO') {
                    echo ('<td>' . $filename . '</td>');
                    echo ('<td>' . '<a href="../../' . $documents->name_file . '" target="_blank">' . '  <button type="button" class="btn btn-warning mg-b-10" data-dismiss="modal">' . 'VER PDF' . '</button>' . '</a>');
                    echo ('<td>' . '<button class="btn btn-danger" data-toggle="modal" data-target="#modaldemo2" onclick="deleteId(' . $documents->id . ')">' . 'Eliminar' . '</button>' . '</td>');
                  }
                }

                ?>
            </tr>

            <tr>
              <td>CONSTANCIA SAT</th>
                <?php
                foreach ($select_documents as $documents) {
                  $filename =  basename($documents->name_file);
                  // print_r($documents);
                  if ($documents->type_file == 'CONSTANCIA SAT') {
                    echo ('<td>' . $filename . '</td>');
                    echo ('<td>' . '<a href="../../' . $documents->name_file . '" target="_blank">' . '  <button type="button" class="btn btn-warning mg-b-10" data-dismiss="modal">' . 'VER PDF' . '</button>' . '</a>');
                    echo ('<td>' . '<button class="btn btn-danger" data-toggle="modal" data-target="#modaldemo2" onclick="deleteId(' . $documents->id . ')">' . 'Eliminar' . '</button>' . '</td>');
                  }
                }

                ?>
            </tr>

            <tr>
              <td>OPINION DEL CUMPLIMIENTO</th>
                <?php
                foreach ($select_documents as $documents) {
                  $filename =  basename($documents->name_file);
                  // print_r($documents);
                  if ($documents->type_file == 'OPINION DEL CUMPLIMIENTO') {
                    echo ('<td>' . $filename . '</td>');
                    echo ('<td>' . '<a href="../../' . $documents->name_file . '" target="_blank">' . '  <button type="button" class="btn btn-warning mg-b-10" data-dismiss="modal">' . 'VER PDF' . '</button>' . '</a>');
                    echo ('<td>' . '<button class="btn btn-danger" data-toggle="modal" data-target="#modaldemo2" onclick="deleteId(' . $documents->id . ')">' . 'Eliminar' . '</button>' . '</td>');
                  }
                }

                ?>
            </tr>

            <tr>
              <td>CUENTAS BANCARIAS</th>
                <?php
                foreach ($select_documents as $documents) {
                  $filename =  basename($documents->name_file);
                  // print_r($documents);
                  if ($documents->type_file == 'CUENTAS BANCARIAS') {
                    echo ('<td>' . $filename . '</td>');
                    echo ('<td>' . '<a href="../../' . $documents->name_file . '" target="_blank">' . '  <button type="button" class="btn btn-warning mg-b-10" data-dismiss="modal">' . 'VER PDF' . '</button>' . '</a>');
                    echo ('<td>' . '<button class="btn btn-danger" data-toggle="modal" data-target="#modaldemo2" onclick="deleteId(' . $documents->id . ')">' . 'Eliminar' . '</button>' . '</td>');
                  }
                }

                ?>
            </tr>

            <tr>
              <td>CONTRATO DE COMPRAVENTA</th>
                <?php
                foreach ($select_documents as $documents) {
                  $filename =  basename($documents->name_file);
                  //print_r($documents);
                  if ($documents->type_file == 'CONTRATO DE COMPRAVENTA') {
                    echo ('<td>' . $filename . '</td>');
                    echo ('<td>' . '<a href="../../' . $documents->name_file . '" target="_blank">' . '  <button type="button" class="btn btn-warning mg-b-10" data-dismiss="modal">' . 'VER PDF' . '</button>' . '</a>');
                    echo ('<td>' . '<button class="btn btn-danger" data-toggle="modal" data-target="#modaldemo2" onclick="deleteId(' . $documents->id . ')">' . 'Eliminar' . '</button>' . '</td>');
                  }
                }

                ?>
            </tr>

            <tr>
              <td>HOJA MEMBRETADA</th>
                <?php
                foreach ($select_documents as $documents) {
                  $filename =  basename($documents->name_file);
                  // print_r($documents);
                  if ($documents->type_file == 'HOJA MEMBRETADA') {
                    echo ('<td>' . $filename . '</td>');
                    echo ('<td>' . '<a href="../../' . $documents->name_file . '" target="_blank">' . '  <button type="button" class="btn btn-warning mg-b-10" data-dismiss="modal">' . 'VER PDF' . '</button>' . '</a>');
                    echo ('<td>' . '<button class="btn btn-danger" data-toggle="modal" data-target="#modaldemo2" onclick="deleteId(' . $documents->id . ')">' . 'Eliminar' . '</button>' . '</td>');
                  }
                }

                ?>
            </tr>






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


<!-- Agregar archivos -->


<div id="modaldemo3" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header bg-success pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Subir documentación</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="pd-20">
        <form id="Archivosform" method="POST" enctype="multipart/form-data" action="<?php echo base_url() ?>/documentacion/agregar_archivos">
          <div class="inputs">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Tipo de Archivo: <span class="tx-danger">*</span></label>
                  <select name="type[]" class="form-control select2" data-placeholder="Choose country">
                    <?php
                    foreach ($get_type_file as $key) {
                      echo ('<option  value="' . $key->id . '" name="producto">' . $key->type_file . '</option>');
                    }
                    ?>
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Archivo: <span class="tx-danger">*</span></label>
                  <input type="file" name="files[]" multiple />
                  <input type="hidden" name="id_bussines" value="<?php echo $dataempresa[0]->id; ?>" />
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-2 pd-t-25">
                <div class="form-group">
                  <button style="margin-left: 52px;" class="btn btn-teal" type="button" onclick="nuevo();"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Agregar Archivo</button>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
          </div>
          <input type="hidden" name="enviar">
          <input id="idform" name="idform" class="form-control" type="hidden">
        </form>

      </div><!-- modal-body -->
      <div class="modal-footer">
        <button form="Archivosform" type="submit" class="btn btn-success pd-x-20"><i class="fa fa-floppy-o mr-1" aria-hidden="true"></i>Guardar</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

<!--borrar docuemnto-->

<div id="modaldemo2" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header bg-danger pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Eliminar DOCUMENTACIÓN</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class=" pd-20">
        <p class="mg-b-5">¿Desea eliminar estos datos?</p>
        <form id="DeleteForm" method="POST" action="<?php echo base_url() ?>/Documentacion/delete_doc">
          <input class="form-control" id="id_prove" name="id" type="hidden">

        </form>
      </div>
      <div class="modal-footer justify-content-center">
        <button form="DeleteForm" type="submit" class="btn btn-danger"><i class="fa fa-trash mr-1" aria-hidden="true"></i>Eliminar</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->



<script src="../../../assets/lib/datatables/jquery.dataTables.js"></script>
<script src="../../../assets/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="../../../assets/lib/select2/js/select2.min.js"></script>


<script>
  //clonar formulario de archivos 
  let nuevo = function() {
    $("<section/>").insertBefore("[name='enviar']")
      .append($(".inputs").html())
      .find("button")
      .attr("onclick", "eliminar(this)")
      .text("Eliminar");
  }

  let eliminar = function(obj) {
    $(obj).closest("section").remove();
  }

  $('#datatable1').DataTable({
    bLengthChange: false,
    searching: false,
    responsive: true
  });

  function deleteId(idprove, name) {
    $("#id_prove").val(idprove);

  }
</script>