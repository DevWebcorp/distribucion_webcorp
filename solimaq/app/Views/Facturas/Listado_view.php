<link href="../../../assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="../../../assets/lib/select2/css/select2.min.css" rel="stylesheet">
<script src="../../../assets/lib/jquery/jquery.js"></script>

<script src="../../../assets/lib/datatables/jquery.dataTables.js"></script>
<script src="../../../assets/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="../../../assets/lib/select2/js/select2.min.js"></script>


<div class="sl-mainpanel">

  <div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40">
      <h5 class="text-dark"><?= $title;?></h5>
      <p class="text-dark"><?= $description;?></p>

        <div class="table-wrapper">
        <table id="datatable2" class="table table-info table-bordered" style="width: 100%;">
          <thead>
            <tr>
            <th class="wd-15p">PDF</th>
              <th class="wd-15p">FECHA SUBIDA</th> 
              <th class="wd-15p">ORIGEN</th>
              <th class="wd-15p">DESTINO </th>
              <th class="wd-20p">CONCEPTO</th>
              <th class="wd-20p">IMPORTE</th>
              <th class="wd-20p">IVA</th>
              <th class="wd-20p">TOTAL</th>
              <th class="wd-20p">FECHA PAGO</th>
              <th class="wd-20p">PAGADO</th>
              <th class="wd-20p">ACCIÓN </th>
              <th class="wd-20p">STATUS DE PAGO </th>
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


<!-- MODAL para subir factura -->
<div id="modal_factura" class="modal fade">
  <div class="modal-dialog modal-dialog-vertical-center" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header bg-success pd-y-20 pd-x-25">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Subir factura</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="pd-20">
        <div class="card pd-20 pd-sm-40">
          <form id="prueba" method="POST" action="<?= base_url() . 'Empresas/editarDatos' ?>">
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Factura PDF: </label>
                    <div class="file-drop-area">
                      <span class="choose-file-button">Subir Archivo</span>
                      <span class="file-message">Arrastra el archivo aqui</span>
                      <input id="file_user" class="file-input" type="file" required name="file_agente" accept=".pdf">
                    </div>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Factura XML: </label>
                    <div class="file-drop-area">
                      <span class="choose-file-button">Subir Archivo</span>
                      <span class="file-message">Arrastra el archivo aqui</span>
                      <input id="file_user" class="file-input" type="file" required name="file_xml" accept=".xml">
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </form>
        </div>
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="submit" form="prueba" class="btn btn-success pd-x-20"><i class="fa fa-floppy-o mr-1" aria-hidden="true"></i>Subir factura</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
      </div><!-- modal-footer -->
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal_actualizacion -->

<!-- MODAL PROGRAMAR -->
<div id="modal_programar" class="modal fade">
  <div class="modal-dialog modal-dialog-vertical-center" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header bg-success pd-y-20 pd-x-25">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Programar fecha de pago</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="pd-20">
    

        <div class="card pd-20 pd-sm-40" style="align-items: center;" >
          <form id="fecha" method="POST" action="<?= base_url() . 'Facturas/fecha_pago' ?>">
            <div class="form-layout">
              <div class="row mg-b-25 text-center">
              <lable>Selecciona la fecha en que se realizará el pago</label>
                <input id="" type= "date" name="fecha-pago" class="mg-t-20" required></input>
                <input class="form-control" id="idfactura" name="idfactura" type="hidden">
                
              </div>
            </div>
          </form>
        </div>
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="submit" form="fecha" class="btn btn-success pd-x-20"><i class="fa fa-clock-o" aria-hidden="true"></i> Programar fecha</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
      </div><!-- modal-footer -->
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modalprogramar fecha -->

<!-- MODAL ESTADO -->
<div id="modalest" class="modal fade">
  <div class="modal-dialog modal-dialog-vertical-center" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header bg-success pd-y-20 pd-x-25">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Confirmar pago</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="pd-20">
        <div class="card pd-20 pd-sm-40" style="align-items: center;" >
          <form id="estado" method="POST" action="<?= base_url() . 'Facturas/estado' ?>">
            <div class="form-layout">
              <div class="row mg-b-25 text-center">
                <lable>¿Seguro que desea actualizar el estado de pago?</label>
                <lable>Una vez realizada esta acción no podrá cambiarla nuevamente</label>

                <input class="form-control" id="id_estado" name="idestado" type="hidden">
                <input class="form-control" id="estado" name="estado" type="hidden" value = "1">;
                
              </div>
            </div>
          </form>
        </div>
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="submit" form="estado" class="btn btn-success pd-x-20"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Aceptar</button>
        <button type="button" form="estado" class="btn btn-secondary pd-x-20" data-dismiss="modal" id="cancelarest"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
      </div><!-- modal-footer -->
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal estado -->




<script>
  var dataTable = $('#datatable2').DataTable({
    ajax: BASE_URL + '/Facturas/get_data_admin/',

    columns: [
      
      {
        data: "factura_pdf",
          render: function(data, type, row, meta) {
            return '<a href="'+BASE_URL+'../../public/images/'+data+'" target="_blank"><img src="../../../assets/img/pdf.png" >    </a>'

            }
          },      
        {
            data: 'fecha_upload'
        },
       
        {
            data: 'origen'
        },
        {
            data: 'destino'
        },
        {
            data: 'concepto'
        },{
            data: 'importe'
        },
        {
            data: 'iva'
        },
        {
            data: 'total'
        },
        {
            data: 'fecha_pago'
        },
        {
            data: 'status',
              render: function(data, type, row, meta) {
                return data == "0" ? '<i class="fa fa-times-circle fa-2x" aria-hidden="true" style="color: red;"></i>'
                 : '<i class="fa fa-check-circle fa-2x" aria-hidden="true" style="color: green;"></i>' 
              }

        }, 
        {
          data: "id",
          render : function(data, type, row, meta) {
            return '<button onclick="programarFecha(' + row.id + ')" data-toggle = "modal" data-target = "#modal_programar" class="btn btn-warning btn-update btn-radio pd-x-20"><i class="fa fa-clock-o" aria-hidden="true"></i> PROGRAMAR</button>'
          }
        },
        {
          
          data: "status",
          render : function(data, type, row, meta) {
            return data == "0" ? '<label class="switch"><input data-toggle="modal" data-target="#modalest" id="estadoch"  name="estadoch" type="checkbox" onclick="estado(' + row.id + ')"><span class="slider round"></span></label>' : '<label class="switch"><input id="' + row.id + '" checked  name="estado" type="checkbox" disabled><span class="slider round"></span></label>'
          }
        }

       /*  {
            data: "id",
            render: function(data, type, row, meta) {
                return '<button id="' + row.id + '"" class="btn btn-warning btn-update btn-radio pd-x-20"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i> ACTUALIZAR</button>' +
                    '<button id="' + row.id + '" data-toggle="modal" data-target="#modal_delete" class="btn btn-danger btn-radio pd-x-20 ml-1 "><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> ELIMINAR</button>'


            }
        }, */
    ],
    language: {
        searchPlaceholder: 'Buscar...',
        sSearch: '',
        lengthMenu: '_MENU_ Filas por página',
    }
});


function programarFecha(idfactura) {
    //alert(idproducto);
    $("#idfactura").val(idfactura);


}


function estado(idestado) {
  $("#id_estado").val(idestado);
  document.getElementById('estadoch').checked=false;


}



function reloadData() {
    //$('#loader').toggle();
    dataTable.ajax.reload();
   // $('#loader').toggle();
}

//'<button class="btn" data-toggle = "modal" data-target = "#modalest" onclick="modalestado(' + row.id + ')"></button>'
</script>