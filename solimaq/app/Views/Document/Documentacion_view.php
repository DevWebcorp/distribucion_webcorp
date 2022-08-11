
<link href="../../assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="../../assets/lib/select2/css/select2.min.css" rel="stylesheet">
<script src="../../assets/lib/jquery/jquery.js"></script>

<div class="sl-mainpanel prueba " style="width:100%;  overflow: scroll;">
  <nav class="breadcrumb sl-breadcrumb">
    
    <span class="breadcrumb-item active">Tabla Proveedores</span>
  </nav>



  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5 class="prueba">Documentacion</h5>
      <!--<p>DataTables is a plug-in for the jQuery Javascript library.</p>-->
    </div><!-- sl-page-title -->

    <div>
      <!--<button class="btn btn-success" onclick="location.href='<?php echo base_url(); ?>/proveedores/agregar'">+ NUEVO PROVEEDOR</button>-->
      <button class="btn btn-success" data-toggle="modal" data-target="#modaldemo3">Subir Documentacion</button>
    </div>
    </br>
    </br>




    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Tabla Proveedores</h6>
      <!--<p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will</p>-->

      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
            <th class="wd-20p">Tipo de Archivo</th>
            <th class="wd-20p">Archivo</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($select_documents as $documents) {
              $filename =  basename($documents->name_file);
              //print_r($pro);

              echo ('<tr>');
                echo ('<td>' . $documents->type_file . '</td>');
                echo ('<td>' . '<a href="../' . $documents->name_file . '" target="_blank">' . $filename . '</a>');
              echo ('</tr>');
            }

            ?>
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
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Subir Archivos</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
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
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-2 pd-t-25">
                  <div class="form-group">
                    <button style="margin-left: 52px;" class="btn btn-info" type="button" onclick="nuevo();">Agregar Archivo</button>
                  </div>
                </div><!-- col-4 -->
              </div><!-- row -->
            </div>
            <input  type="hidden" name="enviar">
            <input id="idform" name="idform" class="form-control" type="hidden">
          </form>
        
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button form="Archivosform" type="submit"  class="btn btn-info pd-x-20">Guardar</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->


<script src="../../assets/lib/datatables/jquery.dataTables.js"></script>
<script src="../../assets/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="../../assets/lib/select2/js/select2.min.js"></script>


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

</script>  


