
<link href="../../assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="../../assets/lib/select2/css/select2.min.css" rel="stylesheet">
<script src="../../assets/lib/jquery/jquery.js"></script>

<div class="sl-mainpanel">
 
  <div class="sl-pagebody">
  
    <div class="card pd-20 pd-sm-40">
      <h5 class="mb-3 text-dark">CLIENTES</h5>
      <h6 class="card-body-title">Tabla Clientes</h6>
      <!--<p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will</p>-->
<!-- Large modal -->


      <div class="table-wrapper">
        <table id="datatable1" class="table table-responsive clientes" style="width: 100%;">
          <thead>
            <tr>
              <th class="wd-15p">Nombre Vendedor</th>
              <th class="wd-20p">Subtotal</th>
              <th class="wd-15p">Tax</th>
              <th class="wd-15p">Contrato</th>
              <th class="wd-15p">Detalle Venta</th>
              <th class="wd-15p">Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php
                foreach ($get_ventas as $venta) {
                echo ('<tr>');
                    echo ('<td>' . $venta->user_name . '</td>');
                    echo ('<td>' . "$".$venta->subtotal . '</td>');
                    echo ('<td>' . $venta->tax . '</td>');
                    echo ('<td>' . '<button class="btn btn-success pd-x-20 btn-create-contract" data-toggle="modal" id="'.$venta->id.'" data-target="#modalcontrato"><i class="fa fa-plus mr-1" aria-hidden="true"></i>' . 'Crear contrato' . '</button>' . '</td>');
                    echo ('<td>' .' <form method="POST" action="'.base_url().'/ventas/tabla_detalle">'.
                                      '<input class="form-control"  type="hidden" name="id_venta" value="'.$venta->id.'">'.
                                      '<button class="btn btn-primary" type="submit" value="Detalle"><i class="fa fa-eye mr-1" aria-hidden="true"></i>Detalle</button>'.
                                    '</form>'.'</td>');
                    echo ('<td>' . '<button class="btn btn-danger" data-toggle="modal" data-target="#delventa" onclick="deleteId('.$venta->id.')"><i class="fa fa-trash mr-1" aria-hidden="true"></i>' . 'Eliminar' . '</button>' . '</td>');

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
      <div class="modal-header bg-success pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Crear Contrato</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="">
        <form id="DeleteProduct" method="POST" action="<?php echo base_url() ?>/contratos/generar_contrato">
        <div class="col-lg-12">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label mt-4">Contrato: <span class="tx-danger">*</span></label>
                  <select name="productos" class="form-control select2" data-placeholder="Choose contract" required>
                  <option value="" name="user">Selecciona Contrato</option>
                    <?php
                    foreach ($get_contratos as $key) {
                      echo ('<option  value="' . $key->id . '" name="type_contract">' . $key->name . '</option>');
                    }
                    ?>
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
        <button form="DeleteProduct" type="submit" class="btn btn-success btn-block mg-b-10"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Aceptar</button>
        <button type="button" class="btn btn-secondary btn-block mg-b-10" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- modal subir archivos-->

<div id="uploadfile" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Selecciona Archivos a Subir</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <form id="file" method="POST" enctype="multipart/form-data" action="<?php echo base_url()?>/ventas/uploadfiles" >
          <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Subir Archivos<span class="tx-danger">*</span></label>
                      <input type="file" name="files[]" multiple />
                      <input id="id_sale"  type="hidden" name="id" multiple />
              </div>
          </div><!-- col-4 -->
        </form>
      </div>
      <div class="modal-footer justify-content-center">
        <button form="file" type="submit" class="btn btn-outline-success btn-block mg-b-10">Aceptar</button>
        <button type="button" class="btn btn-outline-secondary btn-block mg-b-10" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->


<!--  ELIMINAR VENTA   -->

<div id="delventa" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header bg-danger pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Eliminar cliente</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="pd-20">
        <p class="mg-b-5">¿Desea eliminar estos datos?</p>
        <form id="Deleteventa" method="POST" action="<?php echo base_url() ?>/ventas/delete_venta">
          <input class="form-control" id="id_vent" name="id_sale" type="hidden">
        </form>
      </div>
      <div class="modal-footer justify-content-center">
        <button form="Deleteventa" type="submit" class="btn btn-danger"><i class="fa fa-trash mr-1" aria-hidden="true"></i>Eliminar</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->



<!--Leer modal para vista previa-->
<div id="view" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Eliminar Venta</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20" id="append_view">

      </div>
      <div class="modal-footer justify-content-center">
        <button form="Deleteventa" type="submit" class="btn btn-danger">Eliminar</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->




<!--Modal de tamaño grande-->



<script src="../../assets/lib/datatables/jquery.dataTables.js"></script>
<script src="../../assets/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="../../assets/lib/select2/js/select2.min.js"></script>





<script>

  let global_id=0;
  let global_id_venta=0;

  $('.btn-create-contract').on('click',function(){

    let id=$(this).attr('id');
    $('#id_venta').attr('value',id);
  })

  //Aqui selecciono el tipo de contrato
  $("select[name=productos]").change(function(){
    let id=$('select[name=productos]').val();
    let id_v=$('#id_venta').val();
  
    let data={productos:id,id_venta:id_v}
    

    $('#iframe').attr('src',"<?php echo base_url().'/contratos/generar_contrato/'?>"+id+"/"+id_v);
    global_id=id;
    global_id_venta=id_v;


 });//select


  $('.btn_save_view').on('click',function(e){
    e.preventDefault();
    if(global_id==0){
      alert("Seleccione un contrato a subir");
      return 1;
    }
    let data={productos:global_id,id_venta:global_id_venta}
      $.ajax({
  type: "POST",
  url: "<?= base_url(); ?>/contratos/generar_get",
  dataType: "JSON",
  data: data,
  success: function(response) {
   
    console.log(response);
    alert('Guardado exitosamente');
    $('#modalcontrato').modal('hide');
    $("#iframe").attr('src','');
    global_id=0;
    global_id_venta=0;

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


  function deleteId(id){
  $("#id_vent").val(id);

}

$('#datatable1').DataTable({
    language: {
      searchPlaceholder: 'Buscar...',
      sSearch: '',
      lengthMenu: '_MENU_ Filas por página',
    }
  });


  //peticion de contratos

</script>



